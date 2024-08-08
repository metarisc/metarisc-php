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
    public function postContactsErp(string $erp_id, \Metarisc\Model\ObjetContact $objet_contact = null) : void
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/contacts');

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
    public function postDocumentsErp(string $erp_id, \Metarisc\Model\ObjetPieceJointe1 $objet_piece_jointe1 = null) : void
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/documents');

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
     * Ajout d'un dossier.
     */
    public function postDossiersErp(string $erp_id, \Metarisc\Model\ObjetDossier1 $objet_dossier1 = null) : void
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/dossiers');

        $this->request('POST', $path, [
            'json' => [
                'type'  => $objet_dossier1?->getType(),
                'objet' => $objet_dossier1?->getObjet(),
            ],
        ]);
    }

    /**
     * Création d'un nouveau ERP.
     */
    public function postErp(\Metarisc\Model\ObjetERP $objet_erp) : void
    {
        $this->request('POST', '/erp', [
            'json' => [
                'references_exterieures' => $objet_erp->getReferencesExterieures(),
                'implantation'           => $objet_erp->getImplantation(),
            ],
        ]);
    }
}
