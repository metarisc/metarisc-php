<?php

namespace Metarisc\Models;

class WorkflowRemiseEnServicePEI extends WorkflowBase
{
    private ?string $pei_lie        = null;
    private ?array $anomalies_levees=null;
    public function getPeiLie() : ?string
    {
        return $this->pei_lie;
    }

    public function setPeiLie(string $pei_lie)
    {
        $this->pei_lie=$pei_lie;
    }

    public function getAnomaliesLevees() : array
    {
        return $this->anomalies_levees;
    }

    public function setAnomaliesLevees(array $anomalies_levees)
    {
        $this->anomalies_levees=$anomalies_levees;
    }
}
