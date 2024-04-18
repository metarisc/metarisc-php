<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class CommissionsAPI extends MetariscAbstract
{
    /**
     * Suppression d'une commission.
     */
    public function deleteCommission(string $commission_id) : void
    {
        $table = [
            'commission_id' => $commission_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/commissions/{commission_id}');
        $this->request('DELETE', $path);
    }

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

    /**
     * Ajoute une commission.
     */
    public function postCommission(\Metarisc\Model\PostCommissionRequest $post_commission_request) : void
    {
        $this->request('POST', '/commissions', [
            'json' => [
                'type'    => $post_commission_request->getType(),
                'libelle' => $post_commission_request->getLibelle(),
            ],
        ]);
    }

    /**
     * Ajout d'une date de passage en commission.
     */
    public function postCommissionDate(string $commission_id, \Metarisc\Model\PostCommissionDateRequest $post_commission_date_request = null) : void
    {
        $table = [
            'commission_id' => $commission_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/commissions/{commission_id}/dates');

        $this->request('POST', $path, [
            'json' => [
                'libelle'       => $post_commission_date_request?->getLibelle(),
                'type'          => $post_commission_date_request?->getType(),
                'date_de_debut' => $post_commission_date_request?->getDateDeDebut(),
                'date_de_fin'   => $post_commission_date_request?->getDateDeFin(),
            ],
        ]);
    }

    /**
     * Ajout d'un dossier à l'ordre du jour d'un passage en commission.
     */
    public function postCommissionDateDossier(string $commission_id, string $date_id, \Metarisc\Model\PostCommissionDateDossierRequest $post_commission_date_dossier_request = null) : void
    {
        $table = [
            'commission_id' => $commission_id,
            'date_id'       => $date_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/commissions/{commission_id}/dates/{date_id}/ordre_du_jour');

        $this->request('POST', $path, [
            'json' => [
                'dossier_id' => $post_commission_date_dossier_request?->getDossierId(),
            ],
        ]);
    }
}
