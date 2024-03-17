<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class CommissionsAPI extends MetariscAbstract
{
    /**
     * Récupération des détails de la commission.
     */
    public function getCommission(string $commission_id) : Pagerfanta
    {
        $table = [
            'commission_id' => $commission_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/commissions/{commission_id}');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => Commission::class,
        ]);
    }

    /**
     * Récupération de la liste des dates de passage de la commission.
     */
    public function paginateCommissionDates(string $commission_id) : Pagerfanta
    {
        $table = [
            'commission_id' => $commission_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/commissions/{commission_id}/dates');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\PassageCommission::class,
        ]);
    }

    /**
     * Liste des commissions.
     */
    public function paginateCommissions() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/commissions');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Commission::class,
        ]);
    }
}
