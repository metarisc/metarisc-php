<?php

namespace Metarisc\Model;

/*
 * Descriptif technique d'un PIBI - Poteau incendie ou Bouche incendie.
*/

class DescriptifTechniquePIBI extends DescriptifTechniqueDECIBase
{
    private ?float $surpression       = null;
    private ?string $nature           = null;
    private ?float $debit_1bar        = null;
    private ?float $pression          = null;
    private ?float $pression_statique = null;
    private ?float $debit_gueule_bee  = null;

    public function getSurpression() : ?float
    {
        return $this->surpression;
    }

    public function setSurpression(float $surpression) : void
    {
        $this->surpression=$surpression;
    }

    public function getNature() : ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature) : void
    {
        $this->nature=$nature;
    }

    public function getDebit1bar() : ?float
    {
        return $this->debit_1bar;
    }

    public function setDebit1bar(float $debit_1bar) : void
    {
        $this->debit_1bar=$debit_1bar;
    }

    public function getPression() : ?float
    {
        return $this->pression;
    }

    public function setPression(float $pression) : void
    {
        $this->pression=$pression;
    }

    public function getPressionStatique() : ?float
    {
        return $this->pression_statique;
    }

    public function setPressionStatique(float $pression_statique) : void
    {
        $this->pression_statique=$pression_statique;
    }

    public function getDebitGueuleBee() : ?float
    {
        return $this->debit_gueule_bee;
    }

    public function setDebitGueuleBee(float $debit_gueule_bee) : void
    {
        $this->debit_gueule_bee=$debit_gueule_bee;
    }
}
