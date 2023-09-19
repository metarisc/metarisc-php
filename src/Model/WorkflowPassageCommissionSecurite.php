<?php

namespace Metarisc\Model;

class WorkflowPassageCommissionSecurite extends WorkflowBase
{
    private ?string $programmation_evenement = null;

    public function getProgrammationEvenement() : ?string
    {
        return $this->programmation_evenement;
    }

    public function setProgrammationEvenement(string $programmation_evenement) : void
    {
        $this->programmation_evenement=$programmation_evenement;
    }
}
