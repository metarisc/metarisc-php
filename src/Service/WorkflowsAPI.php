<?php

namespace Metarisc\Service;

use Metarisc\Utils;
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
     * Mise à jour d'un workflow. La mise à jour d'un workflow peut concerner son champ observations. Il est possible de modifier son état ce qui peut déclencher des actions. La modification de l'état peut être antidatée en précisant une date de fin (par défaut la date du jour).
     */
    public function updateWorkflowsDetails(string $workflow_id, \Metarisc\Model\ObjetWorkflow $objet_workflow = null) : void
    {
        $table = [
            'workflow_id' => $workflow_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/workflows/{workflow_id}');

        $this->request('POST', $path, [
            'json' => [
                'date_de_fin'  => $objet_workflow?->getDateDeFin(),
                'etat'         => $objet_workflow?->getEtat(),
                'observations' => $objet_workflow?->getObservations(),
            ],
        ]);
    }
}
