<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class AnomaliesAPI extends MetariscAbstract
{
    /**
     * Liste des anomalies.
     */
    public function paginateAnomalies() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/anomalies');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\AnomalieDECI::class,
        ]);
    }
}
