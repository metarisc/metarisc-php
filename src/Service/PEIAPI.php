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
    public function postContactsPei(string $pei_id, \Metarisc\Model\ObjetContact $objet_contact = null) : void
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/contacts');

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
    public function postDocumentsPei(string $pei_id, \Metarisc\Model\ObjetPieceJointe1 $objet_piece_jointe1 = null) : void
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/documents');

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
    public function postDossiersPei(string $pei_id, \Metarisc\Model\ObjetDossier1 $objet_dossier1 = null) : void
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/dossiers');

        $this->request('POST', $path, [
            'json' => [
                'type'  => $objet_dossier1?->getType(),
                'objet' => $objet_dossier1?->getObjet(),
            ],
        ]);
    }

    /**
     * Ajout d'un PEI.
     */
    public function postPei(\Metarisc\Model\ObjetPointDEauIncendie $objet_point_d_eau_incendie) : void
    {
        $this->request('POST', '/pei', [
            'json' => [
                'references_exterieures' => $objet_point_d_eau_incendie->getReferencesExterieures(),
                'implantation'           => $objet_point_d_eau_incendie->getImplantation(),
                'numero'                 => $objet_point_d_eau_incendie->getNumero(),
                'numero_compteur'        => $objet_point_d_eau_incendie->getNumeroCompteur(),
                'numero_serie_appareil'  => $objet_point_d_eau_incendie->getNumeroSerieAppareil(),
            ],
        ]);
    }
}
