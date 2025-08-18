<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Metarisc\MetariscAbstract;

class HealthcheckAPI extends MetariscAbstract
{
    /**
     * Assurez-vous que tous nos services sont opérationnels en effectuant des appels API vers le point de terminaison de contrôle d'intégrité. Ce point de terminaison exécute des contrôles d'intégrité et renvoie un état qui vous indique si le service Metarisc est fonctionnel ou non.
     */
    public function verify() : void
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/healthcheck');
        $this->request('GET', $path);
    }
}
