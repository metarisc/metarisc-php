<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Metarisc\MetariscAbstract;

class OrdresDuJourAPI extends MetariscAbstract
{
    /**
     * Mise à jour des détails d'un dossier lié à une date de passage en commission.
     */
    public function updateCommissionDateDossier(string $dossier_id, \Metarisc\Model\ObjetPassageEnCommissionDossier1 $objet_passage_en_commission_dossier1 = null) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/ordres_du_jour/{dossier_id}');

        $this->request('POST', $path, [
            'json' => [
                'avis' => $objet_passage_en_commission_dossier1?->getAvis(),
            ],
        ]);
    }
}
