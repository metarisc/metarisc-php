<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class WorkflowsAPI extends MetariscAbstract
{
    /**
     * Récupération des détails d'un workflow.
     */
    public function getWorkflowsDetails(string $workflow_id) : \Metarisc\Model\Workflow
    {
        $table = [
            'workflow_id' => $workflow_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/workflows/{workflow_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\Workflow::unserialize($object);
    }

    /**
     * Récupération de la liste des documents.
     */
    public function paginateWorkflowDocuments(string $workflow_id) : Pagerfanta
    {
        $table = [
            'workflow_id' => $workflow_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/workflows/{workflow_id}/documents');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\PieceJointe::class,
        ]);
    }

    /**
     * Ajout d'un document.
     */
    public function postDocumentsWorkflow(string $workflow_id, \Metarisc\Model\ObjetPieceJointe1 $objet_piece_jointe1 = null) : void
    {
        $table = [
            'workflow_id' => $workflow_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/workflows/{workflow_id}/documents');

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
     * Terminer un workflow. Cela met à jour l'ensemble de son traitement.
     */
    public function postTerminerWorkflow(string $workflow_id) : void
    {
        $table = [
            'workflow_id' => $workflow_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/workflows/{workflow_id}/terminer');

        $this->request('POST', $path, [
            'json' => [
            ],
        ]);
    }

    /**
     * Mise à jour d'un workflow.
     */
    public function updateWorkflowsDetails(string $workflow_id, \Metarisc\Model\UNKNOWN_BASE_TYPE $unknown_base_type = null) : void
    {
        $table = [
            'workflow_id' => $workflow_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/workflows/{workflow_id}');

        $this->request('POST', $path, [
            'json' => [$unknown_base_type,
            ],
        ]);
    }
}
