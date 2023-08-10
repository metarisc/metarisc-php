<?php

namespace Metarisc\Services;

use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class DossiersAPI extends MetariscAbstract
{
    protected function replacements(array $replacement_table) : \Closure
    {
        return function (string $matches) use ($replacement_table) {
            $param = $matches[1];
            if (isset($replacement_table[$param])) {
                return $replacement_table[$param];
            } else {
                return $matches;
            }
        };
    }

    public function getDossier(string $dossier_id) : ResponseInterface
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/dossiers/{dossier_id}');

        return $this->request('GET', $path);
    }

    public function paginateDossiers() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/dossiers/');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }

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

    public function patchDossier(string $dossier_id) : ResponseInterface
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/dossiers/{dossier_id}');

        return $this->request('PATCH', $path);
    }

    public function postDossier(\Metarisc\Models\Dossier $dossier) : ResponseInterface
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
