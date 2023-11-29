<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class POIAPI extends MetariscAbstract
{
    /**
     * Récupération de l'ensemble des données d'un POI.
     */
    public function getPoi(string $poi_id) : \Metarisc\Model\POI
    {
        $table = [
            'poi_id' => $poi_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/poi/{poi_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\POI::unserialize($object);
    }

    /**
     * Récupération de la liste des contacts d'un POI.
     */
    public function paginateContacts(string $poi_id) : Pagerfanta
    {
        $table = [
            'poi_id' => $poi_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/poi/{poi_id}/contacts');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Contact::class,
        ]);
    }

    /**
     * Récupération de l'historique d'un POI.
     */
    public function paginateHistorique(string $poi_id) : Pagerfanta
    {
        $table = [
            'poi_id' => $poi_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/poi/{poi_id}/historique');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\DescriptifTechnique::class,
        ]);
    }

    /**
     * Récupération de la liste des pièces jointes d'un POI.
     */
    public function paginatePiecesJointes(string $poi_id) : Pagerfanta
    {
        $table = [
            'poi_id' => $poi_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/poi/{poi_id}/pieces_jointes');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\PieceJointe::class,
        ]);
    }

    /**
     * Récupération de la liste des POI selon des critères de recherche.
     */
    public function paginatePoi() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/poi/');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\POI::class,
        ]);
    }

    /**
     * Modifier un POI existant.
     */
    public function patchPoi(string $poi_id, \Metarisc\Model\PatchPoiRequest $patch_poi_request = null) : void
    {
        $table = [
            'poi_id' => $poi_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/poi/{poi_id}');

        $this->request('PATCH', $path, [
            'json' => [
                'test' => $patch_poi_request?->getTest(),
            ],
        ]);
    }
}
