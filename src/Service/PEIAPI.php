<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class PEIAPI extends MetariscAbstract
{
    /**
     * Récupération de l'ensemble des données d'un PEI.
     */
    public function getPei(string $pei_id) : \Metarisc\Model\PEI
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\PEI::unserialize($object);
    }

    /**
     * Récupération de la liste des contacts.
     */
    public function paginatePeiContacts(string $pei_id) : Pagerfanta
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/contacts');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Contact::class,
        ]);
    }

    /**
     * Récupération de la liste des documents.
     */
    public function paginatePeiDocuments(string $pei_id) : Pagerfanta
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/documents');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\PieceJointe::class,
        ]);
    }

    /**
     * Récupération de la liste des dossiers.
     */
    public function paginatePeiDossiers(string $pei_id) : Pagerfanta
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/dossiers');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Dossier::class,
        ]);
    }

    /**
     * Récupération de l'historique d'un POI.
     */
    public function paginatePeiHistorique(string $pei_id) : Pagerfanta
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/historique');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\DescriptifTechniqueDECI::class,
        ]);
    }

    /**
     * Récupération de la liste des Points d'Eau Incendie (PEI) selon des critères de recherche.
     */
    public function paginatePei() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\PEI::class,
        ]);
    }

    /**
     * Ajout d'un contact.
     */
    public function postContactsPei(string $pei_id, \Metarisc\Model\Contact $contact = null) : void
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/contacts');

        $this->request('POST', $path, [
            'json' => [
                'id'                 => $contact?->getId(),
                'nom'                => $contact?->getNom(),
                'prenom'             => $contact?->getPrenom(),
                'fonction'           => $contact?->getFonction(),
                'telephone_fixe'     => $contact?->getTelephoneFixe(),
                'telephone_portable' => $contact?->getTelephonePortable(),
                'telephone_fax'      => $contact?->getTelephoneFax(),
                'adresse'            => $contact?->getAdresse(),
                'site_web_url'       => $contact?->getSiteWebUrl(),
                'civilite'           => $contact?->getCivilite(),
                'societe'            => $contact?->getSociete(),
                'email'              => $contact?->getEmail(),
                'observations'       => $contact?->getObservations(),
            ],
        ]);
    }

    /**
     * Ajout d'un document.
     */
    public function postDocumentsPei(string $pei_id, \Metarisc\Model\PieceJointe $piece_jointe = null) : void
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/documents');

        $this->request('POST', $path, [
            'json' => [
                'id'          => $piece_jointe?->getId(),
                'url'         => $piece_jointe?->getUrl(),
                'nom'         => $piece_jointe?->getNom(),
                'description' => $piece_jointe?->getDescription(),
                'type'        => $piece_jointe?->getType(),
            ],
        ]);
    }

    /**
     * Ajout d'un dossier.
     */
    public function postDossiersPei(string $pei_id, \Metarisc\Model\Dossier $dossier = null) : void
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/dossiers');

        $this->request('POST', $path, [
            'json' => [
                'id'                       => $dossier?->getId(),
                'type'                     => $dossier?->getType(),
                'description'              => $dossier?->getDescription(),
                'date_de_creation'         => $dossier?->getDateDeCreation(),
                'createur'                 => $dossier?->getCreateur(),
                'application_utilisee_nom' => $dossier?->getApplicationUtiliseeNom(),
                'statut'                   => $dossier?->getStatut(),
                'objet'                    => $dossier?->getObjet(),
                'pei'                      => $dossier?->getPei(),
                'erp'                      => $dossier?->getErp(),
            ],
        ]);
    }

    /**
     * Ajout d'un PEI.
     */
    public function postPei(\Metarisc\Model\PEI $pei) : void
    {
        $this->request('POST', '/pei', [
            'json' => [
                'id'                           => $pei->getId(),
                'date_de_realisation'          => $pei->getDateDeRealisation(),
                'date_de_derniere_mise_a_jour' => $pei->getDateDeDerniereMiseAJour(),
                'references_exterieures'       => $pei->getReferencesExterieures(),
                'descriptif_technique'         => $pei->getDescriptifTechnique(),
                'implantation'                 => $pei->getImplantation(),
                'genre'                        => $pei->getGenre(),
                'numero'                       => $pei->getNumero(),
                'numero_compteur'              => $pei->getNumeroCompteur(),
                'numero_serie_appareil'        => $pei->getNumeroSerieAppareil(),
            ],
        ]);
    }
}
