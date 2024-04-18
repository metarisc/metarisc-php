<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class AnomaliesAPI extends MetariscAbstract
{
    /**
     * Suppression d'une anomalie.
     */
    public function deleteAnomalie(string $anomalie_id) : void
    {
        $table = [
            'anomalie_id' => $anomalie_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/anomalies/{anomalie_id}');
        $this->request('DELETE', $path);
    }

    /**
     * Détails d'une anomalie.
     */
    public function getAnomalie(string $anomalie_id) : \Metarisc\Model\AnomalieDECI
    {
        $table = [
            'anomalie_id' => $anomalie_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/anomalies/{anomalie_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\AnomalieDECI::unserialize($object);
    }

    /**
     * Liste des anomalies.
     */
    public function paginateAnomalies() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/anomalies');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\AnomalieDECI::class,
        ]);
    }

    /**
     * Ajout d'une nouvelle anomalie.
     */
    public function postAnomalie(\Metarisc\Model\AnomalieDECI $anomalie_deci) : void
    {
        $this->request('POST', '/anomalies', [
            'json' => [
                'code'              => $anomalie_deci->getCode(),
                'texte'             => $anomalie_deci->getTexte(),
                'indice_de_gravite' => $anomalie_deci->getIndiceDeGravite(),
            ],
        ]);
    }
}
