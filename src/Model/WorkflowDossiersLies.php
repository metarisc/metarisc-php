<?php

namespace Metarisc\Model;

class WorkflowDossiersLies extends WorkflowBase
{
    private ?array $dossier_lie = null;

    public function getDossierLie() : ?array
    {
        return $this->dossier_lie;
    }

    public function setDossierLie(array $dossier_lie) : void
    {
        $this->dossier_lie=$dossier_lie;
    }
}
