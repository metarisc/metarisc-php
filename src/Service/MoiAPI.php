<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Metarisc\MetariscAbstract;

class MoiAPI extends MetariscAbstract
{
    /**
     * L'utilisateur connecté retourné par ce point de terminaison utilise le token d'accès généré par le service OpenID Connect afin de le lier à une identité connue de Metarisc. Si l'utilisateur est inconnu une erreur est retournée.
     */
    public function moi() : \Metarisc\Model\Utilisateur
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/@moi');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\Utilisateur::unserialize($object);
    }
}
