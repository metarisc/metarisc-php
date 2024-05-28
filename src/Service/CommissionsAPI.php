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
     * Ajoute une commission.
     */
    public function postCommission(\Metarisc\Model\Commission $commission) : void
    {
        $this->request('POST', '/commissions', [
            'json' => [
                'id'      => $commission->getId(),
                'type'    => $commission->getType(),
                'libelle' => $commission->getLibelle(),
            ],
        ]);
    }

    /**
     * Ajout d'une date de passage en commission.
     */
    public function postCommissionDate(string $commission_id, \Metarisc\Model\PassageCommission $passage_commission = null) : void
    {
        $table = [
            'commission_id' => $commission_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/commissions/{commission_id}/dates');

        $this->request('POST', $path, [
            'json' => [
                'id'         => $passage_commission?->getId(),
                'date_debut' => $passage_commission?->getDateDebut(),
                'date_fin'   => $passage_commission?->getDateFin(),
                'type'       => $passage_commission?->getType(),
                'libelle'    => $passage_commission?->getLibelle(),
            ],
        ]);
    }

    /**
     * Ajout d'un dossier à l'ordre du jour d'un passage en commission.
     */
    public function postCommissionDateDossier(string $commission_id, string $date_id, \Metarisc\Model\PassageCommissionDossier $passage_commission_dossier = null) : void
    {
        $table = [
            'commission_id' => $commission_id,
            'date_id'       => $date_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/commissions/{commission_id}/dates/{date_id}/ordre_du_jour');

        $this->request('POST', $path, [
            'json' => [
                'id'         => $passage_commission_dossier?->getId(),
                'dossier'    => $passage_commission_dossier?->getDossier(),
                'dossier_id' => $passage_commission_dossier?->getDossierId(),
                'avis'       => $passage_commission_dossier?->getAvis(),
                'statut'     => $passage_commission_dossier?->getStatut(),
            ],
        ]);
    }
}
