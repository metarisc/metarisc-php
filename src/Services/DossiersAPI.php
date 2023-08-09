<?php

namespace Metarisc\Services;

use Pagerfanta\Pagerfanta;
use Metarisc\Models\Dossier;
use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class DossiersAPI extends MetariscAbstract
{
    private array $replacement_table;

    protected function replacements() : \Closure
    {
        $table = $this->replacement_table;

        return function ($matches) use ($table) {
            $param = $matches[1];
            if (isset($table[$param])) {
                return $table[$param];
            } else {
                return $matches;
            }
        };
    }

    public function getDossier($dossier_id) : ResponseInterface
    {
        $this->replacement_table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/dossiers/{dossier_id}');

        return $this->request('GET', $path);
    }

    public function paginateDossiers() : Pagerfanta
    {
        $this->replacement_table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/dossiers/');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }

    public function paginateSuiviAdministratif($dossier_id) : Pagerfanta
    {
        $this->replacement_table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/dossiers/{dossier_id}/suivi_administratif');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }

    public function paginateTags($dossier_id) : Pagerfanta
    {
        $this->replacement_table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/dossiers/{dossier_id}/tags');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }

    public function paginateWorkflows($dossier_id) : Pagerfanta
    {
        $this->replacement_table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/dossiers/{dossier_id}/workflows');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }

    public function patchDossier($dossier_id) : ResponseInterface
    {
        $this->replacement_table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/dossiers/{dossier_id}');

        return $this->request('PATCH', $path);
    }

    public function postDossier(Dossier $dossier) : ResponseInterface
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
