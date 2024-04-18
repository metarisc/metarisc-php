<?php

namespace Metarisc\Model;

class WorkflowValidation extends WorkflowBase
{
    private ?bool $est_valide = null;

    public function getEstValide() : ?bool
    {
        return $this->est_valide;
    }

    public function setEstValide(bool $est_valide) : void
    {
        $this->est_valide=$est_valide;
    }
}
