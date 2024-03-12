<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class TournesDECIAPI extends MetariscAbstract
{
    /**
     * Liste des tournées DECI.
     */
    public function paginateTourneesDeci() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\TourneeDeci::class,
        ]);
    }
}
