<?php

namespace Metarisc;

use GuzzleHttp\Utils;
use Metarisc\Auth\OAuth2;
use GuzzleHttp\Middleware;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\BodySummarizer;
use Composer\CaBundle\CaBundle;
use Psr\SimpleCache\CacheInterface;
use GuzzleHttp\Client as HttpClient;
use GuzzleRetry\GuzzleRetryMiddleware;
use kamermans\OAuth2\OAuth2Middleware;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use kamermans\OAuth2\GrantType\AuthorizationCode;
use kamermans\OAuth2\GrantType\ClientCredentials;
use kamermans\OAuth2\Persistence\SimpleCacheTokenPersistence;

class Client
{
    public const METARISC_URL = 'https://api.metarisc.fr/';

    private HttpClient $http_client;
    private ?CacheInterface $token_persistence;

    /**
     * Construction d'un client HTTP.
     */
    public function __construct(array $config, CacheInterface $token_persistence = null)
    {
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
            'base_uri' => $config['metarisc_url'] ?? self::METARISC_URL,
            'timeout'  => 30.0,
            'verify'   => CaBundle::getSystemCaRootBundlePath(),
        ]);

        $this->token_persistence = $token_persistence;
    }

    /**
     * Configuration de la persistence des access token permettant de conserver les
     * identifications d'authorization.
     */
    public function setTokenPersistence(CacheInterface $cache) : void
    {
        $this->token_persistence = $cache;
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
     * Déclenche une authentification d'un compte utilisateur Metarisc afin de réaliser des appels
     * aux endpoints protégés.
     *
     * En fonction de l'auth_method choisi, différents params sont attendus :
     * - oauth2:client_credentials :
     *     - scope
     *     - client_id
     *     - client_secret
     * - oauth2:authorization_code :
     *     - scope
     *     - redirect_uri
     *     - code
     *     - client_id
     *     - client_secret
     *
     * Un SimpleCache peut être utilisé pour gérer la persistence des token d'authentification.
     */
    public function authenticate(string $auth_method, array $params) : void
    {
        $http_client = new HttpClient([
            'base_uri' => OAuth2::ACCESS_TOKEN_URL,
            'verify'   => CaBundle::getSystemCaRootBundlePath(),
        ]);

        $grant_type = match ($auth_method) {
            'oauth2:client_credentials' => new ClientCredentials($http_client, [
                'client_id'     => $params['client_id'] ?? '',
                'client_secret' => $params['client_secret'] ?? '',
                'scope'         => $params['scope'] ?? '',
            ]),
            'oauth2:authorization_code' => new AuthorizationCode($http_client, [
                'client_id'     => $params['client_id'] ?? '',
                'client_secret' => $params['client_secret'] ?? '',
                'scope'         => $params['scope'] ?? '',
                'redirect_uri'  => $params['redirect_uri'] ?? '',
                'code'          => $params['code'] ?? '',
            ])
        };

        $middleware = new OAuth2Middleware($grant_type);

        if (null !== $this->token_persistence) {
            $middleware->setTokenPersistence(new SimpleCacheTokenPersistence($this->token_persistence, 'metarisc-oauth2-token'));
        }

        /** @psalm-suppress DeprecatedMethod */
        $handler = $this->http_client->getConfig('handler');

        \assert($handler instanceof HandlerStack);

        $handler->push($middleware);
    }
}