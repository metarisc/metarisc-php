<?php

namespace Metarisc\Model;

class DescriptifTechniquePENAAllOfRealimentation
{
    private ?float $debit                 = null;
    private ?float $diametre_canalisation = null;
    private ?string $nature               = null;

    public function getDebit() : ?float
    {
        return $this->debit;
    }

    public function setDebit(float $debit) : void
    {
        $this->debit=$debit;
    }

    public function getDiametreCanalisation() : ?float
    {
        return $this->diametre_canalisation;
    }

    public function setDiametreCanalisation(float $diametre_canalisation) : void
    {
        $this->diametre_canalisation=$diametre_canalisation;
    }

    public function getNature() : ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature) : void
    {
        $this->nature=$nature;
    }
}
