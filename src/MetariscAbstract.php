<?php

namespace Metarisc;

use GuzzleHttp\Utils;
use Metarisc\Auth\OAuth2;
use GuzzleHttp\Middleware;
use Pagerfanta\Pagerfanta;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\BodySummarizer;
use Composer\CaBundle\CaBundle;
use Psr\SimpleCache\CacheInterface;
use GuzzleHttp\Client as HttpClient;
use GuzzleRetry\GuzzleRetryMiddleware;
use kamermans\OAuth2\OAuth2Middleware;
use Psr\Http\Message\RequestInterface;
use Pagerfanta\Adapter\CallbackAdapter;
use Psr\Http\Message\ResponseInterface;
use kamermans\OAuth2\GrantType\AuthorizationCode;
use kamermans\OAuth2\GrantType\ClientCredentials;
use Symfony\Component\OptionsResolver\OptionsResolver;
use kamermans\OAuth2\Persistence\SimpleCacheTokenPersistence;

abstract class MetariscAbstract
{
    public const METARISC_URL = 'https://api.metarisc.fr/';

    private HttpClient $http_client;
    private array $config;

    /**
     * Création d'une nouvelle instance d'un service Metarisc.
     *
     * La configuration peut contenir :
     * - client_id
     * - metarisc_url : URL de l'API Metarisc (optionnel)
     * - client_secret (optionnel)
     **/
    final public function __construct(array $config = [])
    {
        // Gestion des options de configuration.
        // (OptionsResolver allows to create an options system with required options, defaults, validation (type, value), normalization and more)
        $resolver = new OptionsResolver();

        // Paramètres par défauts
        $resolver->setDefaults([
            'metarisc_url'  => self::METARISC_URL,
            'client_secret' => '',
        ]);

        $resolver->setRequired(['client_id']);

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

        // Création du client HTTP servant à communiquer avec Plat'AU
        $this->http_client = new HttpClient([
            'base_uri' => $this->getConfig()['metarisc_url'],
            'timeout'  => 30.0,
            'verify'   => CaBundle::getSystemCaRootBundlePath(),
        ]);
    }

    /**
     * OAuth2 Authorize URL Generator helper.
     */
    public static function authorizeUrl(array $config = []) : string
    {
        trigger_error('authorizeUrl method is deprecated. Use Oauth2::authorizeUrl', \E_USER_DEPRECATED);

        return OAuth2::authorizeUrl($config);
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

    /**
     * Déclenche une authentification d'un compte utilisateur Metarisc afin de réaliser des appels
     * aux endpoints protégés.
     *
     * En fonction de l'auth_method choisi, différents params sont attendus :
     * - oauth2:client_credentials :
     *     - scope
     * - oauth2:authorization_code :
     *     - scope
     *     - redirect_uri
     *     - code
     *
     * Un SimpleCache peut être utilisé pour gérer la persistence des token d'authentification.
     */
    public function authenticate(string $auth_method, array $params, ?CacheInterface $cache) : void
    {
        $http_client = new HttpClient([
            'base_uri' => OAuth2::ACCESS_TOKEN_URL,
            'verify'   => CaBundle::getSystemCaRootBundlePath(),
        ]);

        $grant_type = match ($auth_method) {
            'oauth2:client_credentials' => new ClientCredentials($http_client, [
                'client_id'     => $this->getConfig()['client_id'],
                'client_secret' => $this->getConfig()['client_secret'],
                'scope'         => $params['scope'] ?? '',
            ]),
            'oauth2:authorization_code' => new AuthorizationCode($http_client, [
                'client_id'     => $this->getConfig()['client_id'],
                'client_secret' => $this->getConfig()['client_secret'],
                'scope'         => $params['scope'] ?? '',
                'redirect_uri'  => $params['redirect_uri'] ?? '',
                'code'          => $params['code'] ?? '',
            ])
        };

        $middleware = new OAuth2Middleware($grant_type);

        if (null !== $cache) {
            $middleware->setTokenPersistence(new SimpleCacheTokenPersistence($cache, 'metarisc-oauth2-token'));
        }

        /** @psalm-suppress DeprecatedMethod */
        $handler = $this->http_client->getConfig('handler');

        \assert($handler instanceof HandlerStack);

        $handler->push($middleware);
    }
}
