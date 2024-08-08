<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Metarisc\MetariscAbstract;

class ControlesPeiAPI extends MetariscAbstract
{
    /**
     * Suppression du contrôle PEI de la tournée DECI.
     */
    public function deleteControle(string $pei_id) : void
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/controles_pei/{pei_id}');
        $this->request('DELETE', $path);
    }

    /**
     * Récupération des détails liés au contrôle d'un PEI d'une tournée.
     */
    public function getControle(string $pei_id) : \Metarisc\Model\TourneeDeciPei
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/controles_pei/{pei_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\TourneeDeciPei::unserialize($object);
    }

    /**
     * Mise à jour du PEI contrôlé.
     */
    public function updateControle(string $pei_id, \Metarisc\Model\ObjetTournEDeciPEI $objet_tourn_e_deci_pei = null) : void
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/controles_pei/{pei_id}');

        $this->request('POST', $path, [
            'json' => [
                'date_du_controle'     => $objet_tourn_e_deci_pei?->getDateDuControle(),
                'liste_anomalies'      => $objet_tourn_e_deci_pei?->getListeAnomalies(),
                'essais_engin_utilise' => $objet_tourn_e_deci_pei?->getEssaisEnginUtilise(),
                'ordre'                => $objet_tourn_e_deci_pei?->getOrdre(),
            ],
        ]);
    }
}
