<?php

namespace Metarisc\Model;

/*
 * Informations sur les essais hydrauliques procédés le jour du contrôle.
*/

class ObjetTournEDeciPEIHydraulique extends ModelAbstract
{
    private ?float $volume            = null;
    private ?float $debit_1bar        = null;
    private ?float $pression          = null;
    private ?float $pression_statique = null;
    private ?float $debit_gueule_bee  = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var float $data['volume'] */
        $object->setVolume($data['volume']);

        /** @var float $data['debit_1bar'] */
        $object->setDebit1bar($data['debit_1bar']);

        /** @var float $data['pression'] */
        $object->setPression($data['pression']);

        /** @var float $data['pression_statique'] */
        $object->setPressionStatique($data['pression_statique']);

        /** @var float $data['debit_gueule_bee'] */
        $object->setDebitGueuleBee($data['debit_gueule_bee']);

        return $object;
    }

    public function getVolume() : ?float
    {
        return $this->volume;
    }

    public function setVolume(float $volume = null) : void
    {
        $this->volume=$volume;
    }

    public function getDebit1bar() : ?float
    {
        return $this->debit_1bar;
    }

    public function setDebit1bar(float $debit_1bar = null) : void
    {
        $this->debit_1bar=$debit_1bar;
    }

    public function getPression() : ?float
    {
        return $this->pression;
    }

    public function setPression(float $pression = null) : void
    {
        $this->pression=$pression;
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
