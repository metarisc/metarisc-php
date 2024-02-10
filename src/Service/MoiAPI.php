<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Metarisc\MetariscAbstract;

class MoiAPI extends MetariscAbstract
{
    /**
     * Récupérer les détails de l'utilisateur connecté.
     */
    public function moi() : \Metarisc\Model\Moi200Response
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/@moi');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\Moi200Response::unserialize($object);
    }
}
