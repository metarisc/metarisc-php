<?php

namespace Metarisc\Auth;

use Symfony\Component\OptionsResolver\OptionsResolver;

final class OAuth2
{
    public const AUTHORIZATION_URL = 'https://lemur-17.cloud-iam.com/auth/realms/metariscoidc/protocol/openid-connect/auth';
    public const ACCESS_TOKEN_URL  = 'https://lemur-17.cloud-iam.com/auth/realms/metariscoidc/protocol/openid-connect/token';

    /**
     * Utilisation d'OAuth2 pour récupérer un access token utilisable dans Metarisc.
     *
     * La configuration doit contenir au moins :
     * - CLIENT_ID (Le client_id de l'application inscrite sur Metarisc ID pour communiquer avec Metarisc)
     * - CLIENT_SECRET (Le client_secret de l'application inscrite sur Metarisc ID pour communiquer avec Metarisc)
     *
     * La configuration peut contenir aussi :
     * - ACCESS_TOKEN_URL
     **/

    /**
     * OAuth2 Authorize URL Generator helper.
     */
    public static function authorizeUrl(array $config = []) : string
    {
        $resolver = new OptionsResolver();

        $resolver->setRequired(['response_type', 'client_id']);
        $resolver->setDefined(['redirect_uri', 'scope']);

        $resolver->setDefaults([
            'authorize_url' => self::AUTHORIZATION_URL,
            'response_type' => 'code',
        ]);

        $config = $resolver->resolve($config);

        $authorize_url = (string) $config['authorize_url'];

        unset($config['authorize_url']);

        $query_string = http_build_query($config);

        return $authorize_url.'?'.$query_string;
    }
}
