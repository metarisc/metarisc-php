<?php

namespace Metarisc\Models;

class WorkflowDossiersLies extends WorkflowBase
{
    private ?string $dossier_lie = null;
    public function getDossierLie() : ?string
    {
        return $this->dossier_lie;
    }

    public function setDossierLie(string $dossier_lie) : void
    {
        $this->dossier_lie=$dossier_lie;
    }
}
