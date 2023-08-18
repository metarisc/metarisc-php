<?php

namespace Metarisc\Service;

use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

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
    public function getDossier(string $dossier_id) : ResponseInterface
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/dossiers/{dossier_id}');

        return $this->request('GET', $path);
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
    public function patchDossier(string $dossier_id) : ResponseInterface
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/dossiers/{dossier_id}');

        return $this->request('PATCH', $path);
    }

    /**
     * Création d'un nouveau dossier.
     */
    public function postDossier(\Metarisc\Model\Dossier $dossier) : ResponseInterface
    {
        return $this->request('POST', '/dossiers/', [
            'json' => [
                'id'                   => $dossier->getId(),
                'type'                 => $dossier->getType(),
                'description'          => $dossier->getDescription(),
                'programmation'        => $dossier->getProgrammation(),
                'date_de_creation'     => $dossier->getDateDeCreation(),
                'createur'             => $dossier->getCreateur(),
                'application_utilisee' => $dossier->getApplicationUtilisee(),
                'statut'               => $dossier->getStatut(),
            ],
        ]);
    }
}
