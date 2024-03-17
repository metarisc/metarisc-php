<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class TournesDECIAPI extends MetariscAbstract
{
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
}
