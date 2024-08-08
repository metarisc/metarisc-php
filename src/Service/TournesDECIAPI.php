<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class TournesDECIAPI extends MetariscAbstract
{
    /**
     * Génération d'un livret de tournée pour une tournée DECI.
     */
    public function getTourneeDeciLivretDeTournee(string $tournee_deci_id) : \SplFileObject
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}/livret_de_tournee');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \SplFileObject::unserialize($object);
    }

    /**
     * Récupération des détails de la tournée DECI.
     */
    public function getTourneeDeci(string $tournee_deci_id) : \Metarisc\Model\TourneeDeci
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\TourneeDeci::unserialize($object);
    }

    /**
     * Récupération de la liste des contrôles PEI liés à la tournée DECI.
     */
    public function paginateTourneeDeciPei(string $tournee_deci_id) : Pagerfanta
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}/pei');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\TourneeDeciPei::class,
        ]);
    }

    /**
     * Liste des tournées DECI.
     */
    public function paginateTourneesDeci() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\TourneeDeci::class,
        ]);
    }

    /**
     * Ajout d'un PEI sur la tournée DECI.
     */
    public function postTourneeDeciPei(string $tournee_deci_id, \Metarisc\Model\ObjetTournEDeciPEI1 $objet_tourn_e_deci_pei1 = null) : void
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}/pei');

        $this->request('POST', $path, [
            'json' => [
                'date_du_controle'     => $objet_tourn_e_deci_pei1?->getDateDuControle(),
                'liste_anomalies'      => $objet_tourn_e_deci_pei1?->getListeAnomalies(),
                'essais_engin_utilise' => $objet_tourn_e_deci_pei1?->getEssaisEnginUtilise(),
                'pei_id'               => $objet_tourn_e_deci_pei1?->getPeiId(),
                'ordre'                => $objet_tourn_e_deci_pei1?->getOrdre(),
            ],
        ]);
    }

    /**
     * Mise à jour de la tournée DECI.
     */
    public function updateTourneeDeci(string $tournee_deci_id, \Metarisc\Model\UNKNOWN_BASE_TYPE $unknown_base_type = null) : void
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}');

        $this->request('POST', $path, [
            'json' => [$unknown_base_type,
            ],
        ]);
    }

    /**
     * Ajout d'une nouvelle tournée DECI.
     */
    public function postTourneeDeci(\Metarisc\Model\UNKNOWN_BASE_TYPE $unknown_base_type) : void
    {
        $this->request('POST', '/tournees_deci', [
            'json' => [$unknown_base_type,
            ],
        ]);
    }
}
