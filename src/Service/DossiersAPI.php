<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class DossiersAPI extends MetariscAbstract
{
    /**
     * Récupération de l'ensemble des données d'un dossier.
     */
    public function getDossier(string $dossier_id) : \Metarisc\Model\Dossier
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\Dossier::unserialize($object);
    }

    /**
     * Récupération de la liste des contacts.
     */
    public function paginateDossierContacts(string $dossier_id) : Pagerfanta
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/contacts');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Contact::class,
        ]);
    }

    /**
     * Récupération de la liste des documents.
     */
    public function paginateDossierDocuments(string $dossier_id) : Pagerfanta
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/documents');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\PieceJointe::class,
        ]);
    }

    /**
     * Récupération de la liste des dossiers selon des critères de recherche.
     */
    public function paginateDossiers() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Dossier::class,
        ]);
    }

    /**
     * Récupération de la liste des tags d'un dossier.
     */
    public function paginateDossierTags(string $dossier_id) : Pagerfanta
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/tags');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Tag::class,
        ]);
    }

    /**
     * Récupération de la liste des workflows d'un dossier.
     */
    public function paginateDossierWorkflows(string $dossier_id) : Pagerfanta
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/workflows');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Workflow::class,
        ]);
    }

    /**
     * Ajout d'un contact.
     */
    public function postContactsDossier(string $dossier_id, \Metarisc\Model\ObjetContact $objet_contact = null) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/contacts');

        $this->request('POST', $path, [
            'json' => [
                'nom'                => $objet_contact?->getNom(),
                'prenom'             => $objet_contact?->getPrenom(),
                'fonction'           => $objet_contact?->getFonction(),
                'telephone_fixe'     => $objet_contact?->getTelephoneFixe(),
                'telephone_portable' => $objet_contact?->getTelephonePortable(),
                'telephone_fax'      => $objet_contact?->getTelephoneFax(),
                'adresse'            => $objet_contact?->getAdresse(),
                'site_web_url'       => $objet_contact?->getSiteWebUrl(),
                'civilite'           => $objet_contact?->getCivilite(),
                'societe'            => $objet_contact?->getSociete(),
                'email'              => $objet_contact?->getEmail(),
                'observations'       => $objet_contact?->getObservations(),
            ],
        ]);
    }

    /**
     * Ajout d'un document.
     */
    public function postDocumentsDossier(string $dossier_id, \Metarisc\Model\ObjetPieceJointe1 $objet_piece_jointe1 = null) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/documents');

        $this->request('POST', $path, [
            'json' => [
                'url'         => $objet_piece_jointe1?->getUrl(),
                'nom'         => $objet_piece_jointe1?->getNom(),
                'description' => $objet_piece_jointe1?->getDescription(),
                'type'        => $objet_piece_jointe1?->getType(),
            ],
        ]);
    }

    /**
     * Modification d'un dossier existant.
     */
    public function patchDossier(string $dossier_id, \Metarisc\Model\ObjetDossier $objet_dossier = null) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}');

        $this->request('POST', $path, [
            'json' => [
                'objet' => $objet_dossier?->getObjet(),
            ],
        ]);
    }
}
