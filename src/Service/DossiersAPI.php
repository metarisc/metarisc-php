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
     * Récupération des détails d'un workflow.
     */
    public function getDossierWorkflowsDetails(string $dossier_id, string $workflow_id) : \Metarisc\Model\Workflow
    {
        $table = [
            'dossier_id'  => $dossier_id,
            'workflow_id' => $workflow_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/workflows/{workflow_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\Workflow::unserialize($object);
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
     * Récupération de la liste des documents.
     */
    public function paginateDossierWorkflowsWorkflowDocuments(string $dossier_id, string $workflow_id) : Pagerfanta
    {
        $table = [
            'dossier_id'  => $dossier_id,
            'workflow_id' => $workflow_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/workflows/{workflow_id}/documents');

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
    public function postContactsDossier(string $dossier_id, \Metarisc\Model\Contact $contact = null) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/contacts');

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
    public function postDocumentsDossier(string $dossier_id, \Metarisc\Model\PieceJointe $piece_jointe = null) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/documents');

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
     * Ajout d'un document.
     */
    public function postDocumentsWorkflowWorkflowsDossier(string $dossier_id, string $workflow_id, \Metarisc\Model\PieceJointe $piece_jointe = null) : void
    {
        $table = [
            'dossier_id'  => $dossier_id,
            'workflow_id' => $workflow_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/workflows/{workflow_id}/documents');

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
     * Modification d'un dossier existant.
     */
    public function patchDossier(string $dossier_id, \Metarisc\Model\Dossier $dossier = null) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}');

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
     * Terminer un workflow d'un dossier. Cela met à jour l'ensemble de son traitement.
     */
    public function postTerminerWorkflowWorkflowsDossier(string $dossier_id, string $workflow_id) : void
    {
        $table = [
            'dossier_id'  => $dossier_id,
            'workflow_id' => $workflow_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/workflows/{workflow_id}/terminer');

        $this->request('POST', $path, [
            'json' => [
            ],
        ]);
    }

    /**
     * Mise à jour d'un workflow.
     */
    public function updateDossierWorkflowsDetails(string $dossier_id, string $workflow_id, \Metarisc\Model\Workflow $workflow = null) : void
    {
        $table = [
            'dossier_id'  => $dossier_id,
            'workflow_id' => $workflow_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/workflows/{workflow_id}');

        $this->request('POST', $path, [
            'json' => [$workflow,
            ],
        ]);
    }
}
