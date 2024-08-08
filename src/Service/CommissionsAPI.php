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
    public function getCommission(string $commission_id) : \Metarisc\Model\Commission
    {
        $table = [
            'commission_id' => $commission_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/commissions/{commission_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\Commission::unserialize($object);
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
     * Ajoute une commission.
     */
    public function postCommission(\Metarisc\Model\ObjetCommission $objet_commission) : void
    {
        $this->request('POST', '/commissions', [
            'json' => [
                'type'    => $objet_commission->getType(),
                'libelle' => $objet_commission->getLibelle(),
            ],
        ]);
    }

    /**
     * Ajout d'une date de passage en commission.
     */
    public function postCommissionDate(string $commission_id, \Metarisc\Model\ObjetPassageEnCommission $objet_passage_en_commission = null) : void
    {
        $table = [
            'commission_id' => $commission_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/commissions/{commission_id}/dates');

        $this->request('POST', $path, [
            'json' => [
                'date_debut' => $objet_passage_en_commission?->getDateDebut(),
                'date_fin'   => $objet_passage_en_commission?->getDateFin(),
                'type'       => $objet_passage_en_commission?->getType(),
                'libelle'    => $objet_passage_en_commission?->getLibelle(),
            ],
        ]);
    }
}
