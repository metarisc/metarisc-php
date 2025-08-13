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
     * Récupération des préférences de la commission.
     */
    public function getCommissionPreferences(string $commission_id) : \Metarisc\Model\CommissionPreferences
    {
        $table = [
            'commission_id' => $commission_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/commissions/{commission_id}/preferences');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\CommissionPreferences::unserialize($object);
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
     * Récupération de la liste des dates de passage de la commission. Cela peut représenter une visite périodique sur site de la commission, ou un passage en salle.
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
     * Récupération de la liste des membres de la commission.
     */
    public function paginateCommissionMembres(string $commission_id) : Pagerfanta
    {
        $table = [
            'commission_id' => $commission_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/commissions/{commission_id}/membres');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\CommissionMembre::class,
        ]);
    }

    /**
     * Ajoute une commission.
     */
    public function postCommission(\Metarisc\Model\ObjetCommission $objet_commission) : void
    {
        $this->request('POST', '/commissions', [
            'json' => [
                'type'           => $objet_commission->getType(),
                'libelle'        => $objet_commission->getLibelle(),
                'presidence_id'  => $objet_commission->getPresidenceId(),
                'secretariat_id' => $objet_commission->getSecretariatId(),
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

    /**
     * Ajout d'un membre dans la commission.
     */
    public function postMembresCommission(string $commission_id, \Metarisc\Model\ObjetCommissionMembre $objet_commission_membre = null) : void
    {
        $table = [
            'commission_id' => $commission_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/commissions/{commission_id}/membres');

        $this->request('POST', $path, [
            'json' => [
                'titre'                => $objet_commission_membre?->getTitre(),
                'presence_obligatoire' => $objet_commission_membre?->getPresenceObligatoire(),
            ],
        ]);
    }

    /**
     * Mise à jour des préférences de la commission en définissant les valeurs des paramètres transmis. Tous les paramètres non fournis resteront inchangés.
     */
    public function postCommissionPreferences(string $commission_id, \Metarisc\Model\ObjetCommissionPrFRences $objet_commission_pr_f_rences = null) : void
    {
        $table = [
            'commission_id' => $commission_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/commissions/{commission_id}/preferences');

        $this->request('POST', $path, [
            'json' => [
                'rapport_modele_cr'        => $objet_commission_pr_f_rences?->getRapportModeleCr(),
                'rapport_modele_pv'        => $objet_commission_pr_f_rences?->getRapportModelePv(),
                'rapport_modele_cr_global' => $objet_commission_pr_f_rences?->getRapportModeleCrGlobal(),
                'rapport_modele_convoc'    => $objet_commission_pr_f_rences?->getRapportModeleConvoc(),
            ],
        ]);
    }
}
