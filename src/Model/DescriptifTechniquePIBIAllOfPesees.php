<?php

namespace Metarisc\Model;

class DescriptifTechniquePIBIAllOfPesees
{
    private ?float $debit_1bar            = null;
    private ?float $pression_debit_requis = null;
    private ?float $pression_statique     = null;
    private ?float $debit_gueule_bee      = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var float $data['debit_1bar'] */
        $object->setDebit1bar($data['debit_1bar']);

        /** @var float $data['pression_debit_requis'] */
        $object->setPressionDebitRequis($data['pression_debit_requis']);

        /** @var float $data['pression_statique'] */
        $object->setPressionStatique($data['pression_statique']);

        /** @var float $data['debit_gueule_bee'] */
        $object->setDebitGueuleBee($data['debit_gueule_bee']);

        return $object;
    }

    public function getDebit1bar() : ?float
    {
        return $this->debit_1bar;
    }

    public function setDebit1bar(float $debit_1bar = null) : void
    {
        $this->debit_1bar=$debit_1bar;
    }

    public function getPressionDebitRequis() : ?float
    {
        return $this->pression_debit_requis;
    }

    public function setPressionDebitRequis(float $pression_debit_requis = null) : void
    {
        $this->pression_debit_requis=$pression_debit_requis;
    }

    public function getPressionStatique() : ?float
    {
        return $this->pression_statique;
    }

    public function setPressionStatique(float $pression_statique = null) : void
    {
        $this->pression_statique=$pression_statique;
    }

    public function getDebitGueuleBee() : ?float
    {
        return $this->debit_gueule_bee;
    }

    public function setDebitGueuleBee(float $debit_gueule_bee = null) : void
    {
        $this->debit_gueule_bee=$debit_gueule_bee;
    }
}
