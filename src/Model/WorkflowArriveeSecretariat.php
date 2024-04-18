<?php

namespace Metarisc\Model;

class WorkflowArriveeSecretariat extends WorkflowBase
{
    private ?\DateTime $date_arrivee_secretariat                   = null;
    private ?\Metarisc\Model\PassageCommission $passage_commission = null;

    public function getDateArriveeSecretariat() : ?\DateTime
    {
        return $this->date_arrivee_secretariat;
    }

    public function setDateArriveeSecretariat(\DateTime $date_arrivee_secretariat) : void
    {
        $this->date_arrivee_secretariat=$date_arrivee_secretariat;
    }

    public function getPassageCommission() : ?PassageCommission
    {
        return $this->passage_commission;
    }

    public function setPassageCommission(PassageCommission $passage_commission) : void
    {
        $this->passage_commission=$passage_commission;
    }
}
