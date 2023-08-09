<?php

namespace Metarisc\Models;

class DescriptifTechniquePIBIAllOfPesees
{
    private ?float $debit_1bar            = null;
    private ?float $pression_debit_requis = null;
    private ?float $pression_statique     = null;
    private ?float $debit_gueule_bee      = null;
    public function getDebit1bar() : ?float
    {
        return $this->debit_1bar;
    }

    public function setDebit1bar(float $debit_1bar)
    {
        $this->debit_1bar=$debit_1bar;
    }

    public function getPressionDebitRequis() : ?float
    {
        return $this->pression_debit_requis;
    }

    public function setPressionDebitRequis(float $pression_debit_requis)
    {
        $this->pression_debit_requis=$pression_debit_requis;
    }

    public function getPressionStatique() : ?float
    {
        return $this->pression_statique;
    }

    public function setPressionStatique(float $pression_statique)
    {
        $this->pression_statique=$pression_statique;
    }

    public function getDebitGueuleBee() : ?float
    {
        return $this->debit_gueule_bee;
    }

    public function setDebitGueuleBee(float $debit_gueule_bee)
    {
        $this->debit_gueule_bee=$debit_gueule_bee;
    }
}
