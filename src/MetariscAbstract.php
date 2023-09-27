<?php

namespace Metarisc;

use Metarisc\Auth\OAuth2;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\CallbackAdapter;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class MetariscAbstract
{
    public const METARISC_URL = 'https://api.metarisc.fr/';

    private Client $http_client;
    private array $config;

    /**
     * Création d'une nouvelle instance d'un service Metarisc.
     *
     * La configuration peut contenir :
     * - client_id
     * - metarisc_url : URL de l'API Metarisc (optionnel)
     * - client_secret (optionnel)
     **/
    final public function __construct(array $config = [], Client $client = null)
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

        // If no HTTP Client is provided, init with Metarisc Default HTTP Client
        $this->http_client = $client ?? new Client($this->getConfig());
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
     * Récupération du client HTTP utilisé par le service Metarisc.
     */
    public function getClient() : Client
    {
        return $this->http_client;
    }

    /**
     * Lancement d'une requête vers Metarisc.
     */
    public function request(string $method, string $uri = '', array $options = []) : ResponseInterface
    {
        return $this->http_client->request($method, $uri, $options + [
                'auth' => 'oauth',
            ]);
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
    public function authenticate(string $auth_method, array $params) : void
    {
        $this->http_client->authenticate($auth_method, $params + [
                'client_id'     => $this->getConfig()['client_id'],
                'client_secret' => $this->getConfig()['client_secret'],
            ]);
    }
}
