<?php

namespace Metarisc;

use GuzzleHttp\Utils;
use GuzzleHttp\Middleware;
use Pagerfanta\Pagerfanta;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\BodySummarizer;
use GuzzleHttp\Client as HttpClient;
use GuzzleRetry\GuzzleRetryMiddleware;
use kamermans\OAuth2\OAuth2Middleware;
use Psr\Http\Message\RequestInterface;
use Pagerfanta\Adapter\CallbackAdapter;
use Psr\Http\Message\ResponseInterface;
use kamermans\OAuth2\GrantType\ClientCredentials;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class MetariscAbstract
{
    public const METARISC_URL     = 'https://api.metarisc.fr/';
    public const ACCESS_TOKEN_URL = 'https://lemur-17.cloud-iam.com/auth/realms/metariscoidc/protocol/openid-connect/token';

    private HttpClient $http_client;
    private array $config;

    /**
     * Création d'une nouvelle instance d'un service Metarisc.
     *
     * La configuration doit contenir au moins :
     * - CLIENT_ID (Le client_id de l'application inscrite sur Metarisc ID pour communiquer avec Metarisc)
     * - CLIENT_SECRET (Le client_secret de l'application inscrite sur Metarisc ID pour communiquer avec Metarisc)
     *
     * La configuration peut contenir aussi :
     * - METARISC_URL
     * - ACCESS_TOKEN_URL
     **/
    public function __construct(array $config = [])
    {
        // Gestion des options de configuration.
        // (OptionsResolver allows to create an options system with required options, defaults, validation (type, value), normalization and more)
        $resolver = new OptionsResolver();

        // Paramètres par défauts
        $resolver->setDefaults([
            'metarisc_url'     => self::METARISC_URL,
            'access_token_url' => self::ACCESS_TOKEN_URL,
            'grant_type'       => 'client_credentials',
            'client_id'        => null,
            'client_secret'    => null,
            'scope'            => 'openid',
        ]);

        $this->config = $resolver->resolve($config);

        // Initialisation du pipeline HTTP utilisé par Guzzle
        $stack = new HandlerStack(Utils::chooseHandler());

        // Retry statregy : on va demander au client Metarisc d'essayer plusieurs fois une requête qui pose problème
        // afin d'éviter de tomber à cause d'un problème de connexion.
        $stack->push(GuzzleRetryMiddleware::factory([
            'max_retry_attempts' => 5,
            'retry_on_status'    => [429, 503, 500],
            'on_retry_callback'  => function (int $attemptNumber, float $delay, RequestInterface &$request, array &$options, ?ResponseInterface $response) {
                $message = sprintf(
                    "Un problème est survenu lors de la requête à %s : Metarisc a répondu avec un code %s. Nous allons attendre %s secondes avant de réessayer. Ceci est l'essai numéro %s.",
                    $request->getUri()->getPath(),
                    $response ? $response->getStatusCode() : '???',
                    number_format($delay, 2),
                    $attemptNumber
                );
                echo $message.\PHP_EOL;
            },
        ]));

        // Personnalisation du middleware de gestion d'erreur (permettant d'éviter de tronquer les messages d'erreur
        // renvoyés par Metarisc)
        $stack->push(Middleware::httpErrors(new BodySummarizer(16384)), 'http_errors');

        // Autorise le suivi des redirections
        /** @var callable(callable): callable $redirect_middleware */
        $redirect_middleware = Middleware::redirect();
        $stack->push($redirect_middleware, 'allow_redirects');

        // Prépare les requests contenants un body, en ajoutant Content-Length, Content-Type, et les entêtes attendues.
        /** @var callable(callable): callable $prepare_body_middleware */
        $prepare_body_middleware = Middleware::redirect();
        $stack->push($prepare_body_middleware, 'prepare_body');

        // Middleware : OAuth2 auth
        $auth_server_http_client = new HttpClient(['base_uri' => $this->getConfig()['access_token_url']]);
        $grant_type              = match ($this->getConfig()['grant_type']) {
            'client_credentials' => new ClientCredentials($auth_server_http_client, $this->getConfig())
        };
        $stack->push(new OAuth2Middleware($grant_type));

        // Création du client HTTP servant à communiquer avec Plat'AU
        $this->http_client = new HttpClient([
            'base_uri' => $this->getConfig()['metarisc_url'],
            'timeout'  => 30.0,
            'handler'  => $stack,
            'auth'     => 'oauth',
        ]);
    }

    /**
     * Récupération des options de configuration.
     */
    public function getConfig() : array
    {
        return $this->config;
    }

    /**
     * Lancement d'une requête vers Metarisc.
     */
    public function request(string $method, string $uri = '', array $options = []) : ResponseInterface
    {
        // Suppression du leading slash car cela peut rentrer en conflit avec la base uri
        $uri = ltrim($uri, '/');

        return $this->http_client->request($method, $uri, $options);
    }

    /**
     * Traitement de la pagination Metarisc (https://metarisc.fr/docs/api/#/#pagination).
     */
    public function pagination(string $method, string $uri = '', array $options = []) : Pagerfanta
    {
        $adapter = new CallbackAdapter(
            // A callable to count the number items in the list
            function () use ($method, $uri, $options) : int {
                $page = json_decode($this->request($method, $uri, $options)->getBody()->__toString(), true, 512, \JSON_THROW_ON_ERROR);
                \assert(\is_array($page), 'La pagination renvoyée par Metarisc est incorrecte : la page renvoyée est invalide');
                \assert(\array_key_exists('meta', $page), 'La pagination renvoyée par Metarisc est incorrecte : il manque les métadonnées');
                $meta = $page['meta'];
                \assert(\is_array($meta), 'La pagination renvoyée par Metarisc est incorrecte : les métadonnées sont invalides');
                \assert(\array_key_exists('pagination', $meta), 'La pagination renvoyée par Metarisc est incorrecte : il manque les métadonnées de la pagination');
                $pagination = $meta['pagination'];
                \assert(\is_array($pagination), 'La pagination renvoyée par Metarisc est incorrecte : les métadonnées de la pagination sont invalides');
                \assert(\array_key_exists('total', $pagination), 'La pagination renvoyée par Metarisc est incorrecte : il manque le total dans les métadonnées de la pagination');
                $total = (int) $pagination['total'];
                \assert($total >= 0, 'La pagination renvoyée par Metarisc est incorrecte : le total est négatif');

                return $total;
            },
            // A callable to get the items for the current page in the paginated list
            function (int $offset, int $length) use ($method, $uri, $options) : iterable {
                $page_number = (int) floor($offset / $length);
                $options     = array_merge_recursive($options, ['query' => ['page' => $page_number, 'per_page' => $length]]);
                $page        = json_decode($this->request($method, $uri, $options)->getBody()->__toString(), true, 512, \JSON_THROW_ON_ERROR);
                \assert(\is_array($page), 'La pagination renvoyée par Metarisc est incorrecte : la page renvoyée est invalide');
                \assert(\array_key_exists('data', $page), 'La pagination renvoyée par Metarisc est incorrecte : il manque les données');
                $data = $page['data'];
                \assert(\is_array($data), 'La pagination renvoyée par Metarisc est incorrecte : les données renvoyées sont invalides');

                return $data;
            }
        );

        return new Pagerfanta($adapter);
    }
}
