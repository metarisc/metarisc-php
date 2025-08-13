<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Metarisc\MetariscAbstract;

class PermissionsAPI extends MetariscAbstract
{
    /**
     * Retourne l'ensemble des permissions de l'utilisateur Metarisc connecté.
     */
    public function get() : \Metarisc\Model\GetPermissions200Response
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/permissions');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\GetPermissions200Response::unserialize($object);
    }
}
