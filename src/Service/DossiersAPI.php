<?php

namespace Metarisc\Service;

use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class DossiersAPI extends MetariscAbstract
{
    protected function replacements(array $replacement_table) : \Closure
    {
        return function (array $matches) use ($replacement_table) : string {
            /** @var array-key $key */
            $key = $matches[1];
            /** @var string $replacement */
            $replacement = $replacement_table[$key] ?? $matches[0];

            return $replacement;
        };
    }

    /**
     * Récupération de l'ensemble des données d'un dossier.
     */
    public function getDossier(string $dossier_id) : \Metarisc\Model\Dossier
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/dossiers/{dossier_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\Dossier::unserialize($object);
    }

    /**
     * Récupération de la liste des dossiers selon des critères de recherche.
     */
    public function paginateDossiers() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/dossiers/');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }

    /**
     * Récupération de la liste du suivi administratif d'un dossier.
     */
    public function paginateSuiviAdministratif(string $dossier_id) : Pagerfanta
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/dossiers/{dossier_id}/suivi_administratif');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }

    /**
     * Récupération de la liste des tags d'un dossier.
     */
    public function paginateTags(string $dossier_id) : Pagerfanta
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/dossiers/{dossier_id}/tags');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }

    /**
     * Liste des documents liés à un workflow.
     */
    public function paginateWorkflowDocuments(string $dossier_id, string $workflow_id) : Pagerfanta
    {
        $table = [
            'dossier_id'  => $dossier_id,
            'workflow_id' => $workflow_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/dossiers/{dossier_id}/workflows/{workflow_id}/documents');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }

    /**
     * Récupération de la liste des workflows d'un dossier.
     */
    public function paginateWorkflows(string $dossier_id) : Pagerfanta
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/dossiers/{dossier_id}/workflows');

        return $this->pagination('GET', $path, [
            'params' => [],
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

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/dossiers/{dossier_id}');

        $this->request('PATCH', $path, [
            'json' => [
                'id'                   => $dossier?->getId(),
                'type'                 => $dossier?->getType(),
                'description'          => $dossier?->getDescription(),
                'date_de_creation'     => $dossier?->getDateDeCreation(),
                'createur'             => $dossier?->getCreateur(),
                'application_utilisee' => $dossier?->getApplicationUtilisee(),
                'statut'               => $dossier?->getStatut(),
            ],
        ]);
    }

    /**
     * Création d'un nouveau dossier.
     */
    public function postDossier(\Metarisc\Model\PostDossierRequest $post_dossier_request) : void
    {
        $this->request('POST', '/dossiers/', [
            'json' => [
                'titre'       => $post_dossier_request->getTitre(),
                'description' => $post_dossier_request->getDescription(),
                'workflows'   => $post_dossier_request->getWorkflows(),
            ],
        ]);
    }
}
