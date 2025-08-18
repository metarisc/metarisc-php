<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class MainsCourantesAPI extends MetariscAbstract
{
    /**
     * Suppression d'une main courante existante.
     */
    public function deleteMainCourante(string $main_courante_id) : void
    {
        $table = [
            'main_courante_id' => $main_courante_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/mains_courantes/{main_courante_id}');
        $this->request('DELETE', $path);
    }

    /**
     * Récupération d'une main courante existante.
     */
    public function getMainCourante(string $main_courante_id) : \Metarisc\Model\MainCourante
    {
        $table = [
            'main_courante_id' => $main_courante_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/mains_courantes/{main_courante_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\MainCourante::unserialize($object);
    }

    /**
     * Liste des participants de la main courante.
     */
    public function getParticipantsMainCourante(string $main_courante_id) : \Metarisc\Model\GetParticipantsMainCouranteMainsCourantes200Response
    {
        $table = [
            'main_courante_id' => $main_courante_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/mains_courantes/{main_courante_id}/participants');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\GetParticipantsMainCouranteMainsCourantes200Response::unserialize($object);
    }

    /**
     * Récupération de la liste des documents.
     */
    public function paginateMainCouranteDocuments(string $main_courante_id) : Pagerfanta
    {
        $table = [
            'main_courante_id' => $main_courante_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/mains_courantes/{main_courante_id}/documents');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\PieceJointe::class,
        ]);
    }

    /**
     * Ajout d'un document.
     */
    public function postDocumentsMainCourante(string $main_courante_id, \Metarisc\Model\ObjetPieceJointe1 $objet_piece_jointe1 = null) : void
    {
        $table = [
            'main_courante_id' => $main_courante_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/mains_courantes/{main_courante_id}/documents');

        $this->request('POST', $path, [
            'json' => [
                'url'          => $objet_piece_jointe1?->getUrl(),
                'nom'          => $objet_piece_jointe1?->getNom(),
                'description'  => $objet_piece_jointe1?->getDescription(),
                'type'         => $objet_piece_jointe1?->getType(),
                'est_sensible' => $objet_piece_jointe1?->getEstSensible(),
            ],
        ]);
    }

    /**
     * Mise à jour d'une main courante existante en définissant les valeurs des paramètres transmis. Tous les paramètres non fournis resteront inchangés.
     */
    public function postMainCourante(string $main_courante_id, \Metarisc\Model\ObjetMainCourante1 $objet_main_courante1 = null) : void
    {
        $table = [
            'main_courante_id' => $main_courante_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/mains_courantes/{main_courante_id}');

        $this->request('POST', $path, [
            'json' => [
                'objet'        => $objet_main_courante1?->getObjet(),
                'date'         => $objet_main_courante1?->getDate(),
                'compte_rendu' => $objet_main_courante1?->getCompteRendu(),
                'type'         => $objet_main_courante1?->getType(),
            ],
        ]);
    }

    /**
     * Ajoute une participation à une main courante. Vous pouvez affecter plusieurs personnes à la main courante, y compris vous-même.
     */
    public function postParticipantsMainCourante(string $main_courante_id, \Metarisc\Model\ObjetMainCouranteAffectation $objet_main_courante_affectation = null) : void
    {
        $table = [
            'main_courante_id' => $main_courante_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/mains_courantes/{main_courante_id}/participants');

        $this->request('POST', $path, [
            'json' => [
                'utilisateur_id' => $objet_main_courante_affectation?->getUtilisateurId(),
            ],
        ]);
    }
}
