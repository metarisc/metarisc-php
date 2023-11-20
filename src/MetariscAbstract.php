<?php

namespace Metarisc;

use Metarisc\Auth\OAuth2;
use Pagerfanta\Pagerfanta;
use Metarisc\Model\ModelAbstract;
use Psr\Http\Message\ResponseInterface;
use Pagerfanta\Adapter\TransformingAdapter;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Metarisc\Pagerfanta\Adapter\MetariscPaginationAdapter;

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
        $adapter = new MetariscPaginationAdapter($this, $method, $uri, $options);

        // Si il existe l'option "model_class", on essaie d'unserialize les résultats de la pagination
        // retournée avec le model donné.
        if (\array_key_exists('model_class', $options)) {
            $adapter = new TransformingAdapter($adapter, function ($item) use ($options) : ModelAbstract {
                $model_class = $options['model_class'];
                \assert(\is_string($model_class));
                \assert(is_a($model_class, ModelAbstract::class, true));
                \assert(\is_array($item));

                return $model_class::unserialize($item);
            });
        }

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
