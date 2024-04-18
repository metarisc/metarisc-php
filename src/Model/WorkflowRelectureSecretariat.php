<?php

namespace Metarisc\Model;

class WorkflowRelectureSecretariat extends WorkflowBase
{
    private ?bool $est_relu = null;

    public function getEstRelu() : ?bool
    {
        return $this->est_relu;
    }

    public function setEstRelu(bool $est_relu) : void
    {
        $this->est_relu=$est_relu;
    }
}
