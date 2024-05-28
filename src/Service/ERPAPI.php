<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class ERPAPI extends MetariscAbstract
{
    /**
     * Récupération des détails de l'ERP.
     */
    public function getErp(string $erp_id) : \Metarisc\Model\ERP
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\ERP::unserialize($object);
    }

    /**
     * Récupération de la liste des contacts.
     */
    public function paginateErpContacts(string $erp_id) : Pagerfanta
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/contacts');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Contact::class,
        ]);
    }

    /**
     * Récupération de la liste des documents.
     */
    public function paginateErpDocuments(string $erp_id) : Pagerfanta
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/documents');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\PieceJointe::class,
        ]);
    }

    /**
     * Récupération de la liste des dossiers.
     */
    public function paginateErpDossiers(string $erp_id) : Pagerfanta
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/dossiers');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Dossier::class,
        ]);
    }

    /**
     * Récupération de la liste des ERP.
     */
    public function paginateErp() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\ERP::class,
        ]);
    }

    /**
     * Récupération de l'historique d'un ERP.
     */
    public function paginateErpHistorique(string $erp_id) : Pagerfanta
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/historique');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\DescriptifTechniqueERP::class,
        ]);
    }

    /**
     * Ajout d'un contact.
     */
    public function postContactsErp(string $erp_id, \Metarisc\Model\Contact $contact = null) : void
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/contacts');

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
    public function postDocumentsErp(string $erp_id, \Metarisc\Model\PieceJointe $piece_jointe = null) : void
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/documents');

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
    public function postDossiersErp(string $erp_id, \Metarisc\Model\Dossier $dossier = null) : void
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/dossiers');

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
                'pei_id'                   => $dossier?->getPeiId(),
                'pei'                      => $dossier?->getPei(),
                'erp_id'                   => $dossier?->getErpId(),
                'erp'                      => $dossier?->getErp(),
            ],
        ]);
    }

    /**
     * Création d'un nouveau ERP.
     */
    public function postErp(\Metarisc\Model\ERP $erp) : void
    {
        $this->request('POST', '/erp', [
            'json' => [
                'id'                           => $erp->getId(),
                'date_de_realisation'          => $erp->getDateDeRealisation(),
                'date_de_derniere_mise_a_jour' => $erp->getDateDeDerniereMiseAJour(),
                'references_exterieures'       => $erp->getReferencesExterieures(),
                'implantation'                 => $erp->getImplantation(),
                'descriptif_technique'         => $erp->getDescriptifTechnique(),
                'coordonnees'                  => $erp->getCoordonnees(),
            ],
        ]);
    }
}
