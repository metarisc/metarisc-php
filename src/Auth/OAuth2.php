<?php

namespace Metarisc\Auth;

use Symfony\Component\OptionsResolver\OptionsResolver;

final class OAuth2
{
    /**
     * OAuth2 Authorize URL Generator helper.
     */
    public static function authorizeUrl(array $config = []) : string
    {
        $resolver = new OptionsResolver();

        $resolver->setRequired(['response_type', 'client_id']);
        $resolver->setDefined(['redirect_uri', 'scope']);

        $resolver->setDefaults([
            'authorize_url' => 'https://lemur-17.cloud-iam.com/auth/realms/metariscoidc/protocol/openid-connect/auth',
            'response_type' => 'code',
        ]);

        $config = $resolver->resolve($config);

        $authorize_url = (string) $config['authorize_url'];

        unset($config['authorize_url']);

        $query_string = http_build_query($config);

        return $authorize_url.'?'.$query_string;
    }
}
