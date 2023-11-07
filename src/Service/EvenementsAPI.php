<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class EvenementsAPI extends MetariscAbstract
{
    /**
     * Suppression d'un événement correspondant à l'id donné.
     */
    public function deleteEvenement(string $evenement_id) : void
    {
        $table = [
            'evenement_id' => $evenement_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/evenements/{evenement_id}');
        $this->request('DELETE', $path);
    }

    /**
     * Récupération des détails d'un événement correspondant à l'id donné.
     */
    public function getEvenement(string $evenement_id, \Metarisc\Model\Evenement $evenement = null) : \Metarisc\Model\Evenement
    {
        $table = [
            'evenement_id' => $evenement_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/evenements/{evenement_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\Evenement::unserialize($object);
    }

    /**
     * Récupération d'une liste paginée d'utilisateurs liés à un événement calendaire.
     */
    public function paginateEvenementUtilisateurs(string $evenement_id) : Pagerfanta
    {
        $table = [
            'evenement_id' => $evenement_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/evenements/{evenement_id}/utilisateurs');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }

    /**
     * Récupération des détails de tous les événements calendaires existants.
     */
    public function paginateEvenements() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/evenements/');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }

    /**
     * Création d'un événement.
     */
    public function postEvenement(\Metarisc\Model\PostEvenementRequest $post_evenement_request) : void
    {
        $this->request('POST', '/evenements/', [
            'json' => [
                'title'       => $post_evenement_request->getTitle(),
                'type'        => $post_evenement_request->getType(),
                'description' => $post_evenement_request->getDescription(),
                'date_debut'  => $post_evenement_request->getDateDebut(),
                'date_fin'    => $post_evenement_request->getDateFin(),
            ],
        ]);
    }
}
