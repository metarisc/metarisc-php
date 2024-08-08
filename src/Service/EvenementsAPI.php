<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class EvenementsAPI extends MetariscAbstract
{
    /**
     * Suppression d'un événement.
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
    public function getEvenementDetails(string $evenement_id) : \Metarisc\Model\Evenement
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
     * Récupération des détails de tous les événements calendaires existants.
     */
    public function paginateEvenements() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/evenements');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Evenement::class,
        ]);
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
            'params'      => [],
            'model_class' => \Metarisc\Model\Utilisateur::class,
        ]);
    }

    /**
     * Création d'un événement.
     */
    public function postEvenement(\Metarisc\Model\ObjetEvenement $objet_evenement) : void
    {
        $this->request('POST', '/evenements', [
            'json' => [
                'title'       => $objet_evenement->getTitle(),
                'type'        => $objet_evenement->getType(),
                'description' => $objet_evenement->getDescription(),
                'date_debut'  => $objet_evenement->getDateDebut(),
                'date_fin'    => $objet_evenement->getDateFin(),
            ],
        ]);
    }
}
