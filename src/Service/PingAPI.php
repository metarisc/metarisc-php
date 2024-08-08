<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Metarisc\MetariscAbstract;

class PingAPI extends MetariscAbstract
{
    /**
     * Permet de s'assurer que le service Metarisc est en ligne. Ping ... Pong ! Cet endpoint peut être utilisé sans authentification.
     */
    public function ping() : \Metarisc\Model\GetPing200Response
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/ping');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\GetPing200Response::unserialize($object);
    }
}
