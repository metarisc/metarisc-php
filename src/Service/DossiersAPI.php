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
     * Récupération de la liste des contacts d'un dossier.
     */
    public function paginateDossierContacts(string $dossier_id) : Pagerfanta
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/contacts');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Workflow::class,
        ]);
    }

    /**
     * Récupération de la liste des documents d'un dossier.
     */
    public function paginateDossierDocuments(string $dossier_id) : Pagerfanta
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/documents');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Workflow::class,
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
     * Liste des documents liés à un workflow.
     */
    public function paginateDossierWorkflowDocuments(string $dossier_id, string $workflow_id) : Pagerfanta
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
     * TODO : Modification d'un dossier existant.
     */
    public function patchDossier(string $dossier_id, \Metarisc\Model\Dossier $dossier = null) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}');

        $this->request('PATCH', $path, [
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
     * Création d'un nouveau dossier.
     */
    public function postDossier(\Metarisc\Model\Dossier $dossier) : void
    {
        $this->request('POST', '/dossiers', [
            'json' => [
                'id'                       => $dossier->getId(),
                'type'                     => $dossier->getType(),
                'description'              => $dossier->getDescription(),
                'date_de_creation'         => $dossier->getDateDeCreation(),
                'createur'                 => $dossier->getCreateur(),
                'application_utilisee_nom' => $dossier->getApplicationUtiliseeNom(),
                'statut'                   => $dossier->getStatut(),
                'objet'                    => $dossier->getObjet(),
                'pei'                      => $dossier->getPei(),
                'erp'                      => $dossier->getErp(),
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
