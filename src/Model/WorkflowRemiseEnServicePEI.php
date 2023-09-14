<?php

namespace Metarisc\Model;

class WorkflowRemiseEnServicePEI extends WorkflowBase
{
    private ?string $pei_lie         = null;
    private ?array $anomalies_levees = null;

    public function getPeiLie() : ?string
    {
        return $this->pei_lie;
    }

    public function setPeiLie(string $pei_lie) : void
    {
        $this->pei_lie=$pei_lie;
    }

    public function getAnomaliesLevees() : ?array
    {
        return $this->anomalies_levees;
    }

    public function setAnomaliesLevees(array $anomalies_levees) : void
    {
        $this->anomalies_levees=$anomalies_levees;
    }
}
