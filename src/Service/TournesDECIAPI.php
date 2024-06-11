<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class TournesDECIAPI extends MetariscAbstract
{
    /**
     * Suppression du contrôle PEI de la tournée DECI.
     */
    public function deleteTourneeDeciPei(string $tournee_deci_id, string $pei_id) : void
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            'pei_id'          => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}/pei/{pei_id}');
        $this->request('DELETE', $path);
    }

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
     * Récupération des détails liés au contrôle d'un PEI d'une tournée.
     */
    public function getTourneeDeciPei(string $tournee_deci_id, string $pei_id) : \Metarisc\Model\TourneeDeciPei
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            'pei_id'          => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}/pei/{pei_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\TourneeDeciPei::unserialize($object);
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
     * Mise à jour du PEI contrôlé dans une tournée DECI.
     */
    public function updateTourneeDeciPei(string $tournee_deci_id, string $pei_id, \Metarisc\Model\TourneeDeciPei $tournee_deci_pei = null) : void
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            'pei_id'          => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}/pei/{pei_id}');

        $this->request('POST', $path, [
            'json' => [
                'id'                   => $tournee_deci_pei?->getId(),
                'date_du_controle'     => $tournee_deci_pei?->getDateDuControle(),
                'liste_anomalies'      => $tournee_deci_pei?->getListeAnomalies(),
                'essais_engin_utilise' => $tournee_deci_pei?->getEssaisEnginUtilise(),
                'pei_id'               => $tournee_deci_pei?->getPeiId(),
                'pei'                  => $tournee_deci_pei?->getPei(),
                'est_controle'         => $tournee_deci_pei?->getEstControle(),
                'ordre'                => $tournee_deci_pei?->getOrdre(),
            ],
        ]);
    }

    /**
     * Ajout d'un PEI sur la tournée DECI.
     */
    public function postTourneeDeciPei(string $tournee_deci_id, \Metarisc\Model\TourneeDeciPei $tournee_deci_pei = null) : void
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}/pei');

        $this->request('POST', $path, [
            'json' => [
                'id'                   => $tournee_deci_pei?->getId(),
                'date_du_controle'     => $tournee_deci_pei?->getDateDuControle(),
                'liste_anomalies'      => $tournee_deci_pei?->getListeAnomalies(),
                'essais_engin_utilise' => $tournee_deci_pei?->getEssaisEnginUtilise(),
                'pei_id'               => $tournee_deci_pei?->getPeiId(),
                'pei'                  => $tournee_deci_pei?->getPei(),
                'est_controle'         => $tournee_deci_pei?->getEstControle(),
                'ordre'                => $tournee_deci_pei?->getOrdre(),
            ],
        ]);
    }

    /**
     * Mise à jour de la tournée DECI.
     */
    public function updateTourneeDeci(string $tournee_deci_id, \Metarisc\Model\TourneeDeci $tournee_deci = null) : void
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}');

        $this->request('POST', $path, [
            'json' => [$tournee_deci,
            ],
        ]);
    }

    /**
     * Ajout d'une nouvelle tournée DECI.
     */
    public function postTourneeDeci(\Metarisc\Model\TourneeDeci $tournee_deci) : void
    {
        $this->request('POST', '/tournees_deci', [
            'json' => [$tournee_deci,
            ],
        ]);
    }
}
