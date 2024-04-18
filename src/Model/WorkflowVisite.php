<?php

namespace Metarisc\Model;

class WorkflowVisite extends WorkflowBase
{
    private ?\Metarisc\Model\PassageCommission $passage_commission = null;

    public function getPassageCommission() : ?PassageCommission
    {
        return $this->passage_commission;
    }

    public function setPassageCommission(PassageCommission $passage_commission) : void
    {
        $this->passage_commission=$passage_commission;
    }
}
