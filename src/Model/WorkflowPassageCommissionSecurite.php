<?php

namespace Metarisc\Model;

class WorkflowPassageCommissionSecurite extends WorkflowBase
{
    private ?\Metarisc\Model\PassageCommission $commission_date = null;
    private ?\Metarisc\Model\Avis $avis_de_commission           = null;

    public function getCommissionDate() : ?PassageCommission
    {
        return $this->commission_date;
    }

    public function setCommissionDate(PassageCommission $commission_date) : void
    {
        $this->commission_date=$commission_date;
    }

    public function getAvisDeCommission() : ?Avis
    {
        return $this->avis_de_commission;
    }

    public function setAvisDeCommission(Avis $avis_de_commission) : void
    {
        $this->avis_de_commission=$avis_de_commission;
    }
}
