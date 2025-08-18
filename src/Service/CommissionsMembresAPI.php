<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class CommissionsMembresAPI extends MetariscAbstract
{
    /**
     * Suppression d'un membre de commission existant.
     */
    public function deleteMembre(string $membre_id) : void
    {
        $table = [
            'membre_id' => $membre_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/commissions_membres/{membre_id}');
        $this->request('DELETE', $path);
    }

    /**
     * Récupération d'une fiche d'un membre d'une commission.
     */
    public function getMembre(string $membre_id) : \Metarisc\Model\CommissionMembre
    {
        $table = [
            'membre_id' => $membre_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/commissions_membres/{membre_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\CommissionMembre::unserialize($object);
    }

    /**
     * Récupération de la liste membres des commissions.
     */
    public function paginateMembres() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/commissions_membres');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\CommissionMembre::class,
        ]);
    }

    /**
     * Mise à jour d'un membre de commission existant en définissant les valeurs des paramètres transmis. Tous les paramètres non fournis resteront inchangés.
     */
    public function updateMembre(string $membre_id, \Metarisc\Model\ObjetCommissionMembre1 $objet_commission_membre1 = null) : void
    {
        $table = [
            'membre_id' => $membre_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/commissions_membres/{membre_id}');

        $this->request('POST', $path, [
            'json' => [
                'titre'                => $objet_commission_membre1?->getTitre(),
                'presence_obligatoire' => $objet_commission_membre1?->getPresenceObligatoire(),
            ],
        ]);
    }
}
