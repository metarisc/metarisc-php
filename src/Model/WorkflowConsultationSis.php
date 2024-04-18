<?php

namespace Metarisc\Model;

class WorkflowConsultationSis extends WorkflowBase
{
    private ?\Metarisc\Model\Commission $commission = null;

    public function getCommission() : ?Commission
    {
        return $this->commission;
    }

    public function setCommission(Commission $commission) : void
    {
        $this->commission=$commission;
    }
}
