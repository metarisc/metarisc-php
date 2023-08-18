<?php

namespace Metarisc\Model;

class WorkflowDossiersLies extends WorkflowBase
{
    public function getDossierLie() : ?string
    {
        return $this->dossier_lie;
    }

    public function setDossierLie(string $dossier_lie) : void
    {
        $this->dossier_lie=$dossier_lie;
    }
}
