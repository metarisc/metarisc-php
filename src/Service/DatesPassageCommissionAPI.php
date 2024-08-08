<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class DatesPassageCommissionAPI extends MetariscAbstract
{
    /**
     * Récupération d'une date de passage en commission.
     */
    public function getCommissionDate(string $date_id) : \Metarisc\Model\PassageCommission
    {
        $table = [
            'date_id' => $date_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dates_passage_commission/{date_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\PassageCommission::unserialize($object);
    }

    /**
     * Récupération d'une liste de dossiers à l'ordre du jour liés à une date de passage en commission.
     */
    public function paginateCommissionDateDossiers(string $date_id) : Pagerfanta
    {
        $table = [
            'date_id' => $date_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dates_passage_commission/{date_id}/ordre_du_jour');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\PassageCommissionDossier::class,
        ]);
    }

    /**
     * Ajout d'un dossier à l'ordre du jour d'un passage en commission.
     */
    public function postCommissionDateDossier(string $date_id, \Metarisc\Model\ObjetPassageEnCommissionDossier $objet_passage_en_commission_dossier = null) : void
    {
        $table = [
            'date_id' => $date_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dates_passage_commission/{date_id}/ordre_du_jour');

        $this->request('POST', $path, [
            'json' => [
                'dossier_id' => $objet_passage_en_commission_dossier?->getDossierId(),
            ],
        ]);
    }
}
