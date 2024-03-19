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
     * Récupération d'une date de passage en commission.
     */
    public function getCommissionDate(string $commission_id, string $date_id) : \Metarisc\Model\PassageCommission
    {
        $table = [
            'commission_id' => $commission_id,
            'date_id'       => $date_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/commissions/{commission_id}/dates/{date_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\PassageCommission::unserialize($object);
    }

    /**
     * Récupération d'une liste de dossiers à l'ordre du jour liés à une date de passage en commission.
     */
    public function paginateCommissionDateDossiers(string $commission_id, string $date_id) : Pagerfanta
    {
        $table = [
            'commission_id' => $commission_id,
            'date_id'       => $date_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/commissions/{commission_id}/dates/{date_id}/ordre_du_jour');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\PassageCommissionDossier::class,
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
