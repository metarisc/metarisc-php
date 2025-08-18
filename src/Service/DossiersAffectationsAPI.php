<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Metarisc\MetariscAbstract;

class DossiersAffectationsAPI extends MetariscAbstract
{
    /**
     * Suppression d'une affectation d'un dossier.
     */
    public function deleteAffectation(string $affectation_id) : void
    {
        $table = [
            'affectation_id' => $affectation_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers_affectations/{affectation_id}');
        $this->request('DELETE', $path);
    }

    /**
     * Mise à jour d'une affectation existante en définissant les valeurs des paramètres transmis. Tous les paramètres non fournis resteront inchangés.
     */
    public function postAffectation(string $affectation_id, \Metarisc\Model\ObjetDossierAffectation1 $objet_dossier_affectation1 = null) : void
    {
        $table = [
            'affectation_id' => $affectation_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers_affectations/{affectation_id}');

        $this->request('POST', $path, [
            'json' => [
                'role' => $objet_dossier_affectation1?->getRole(),
            ],
        ]);
    }
}
