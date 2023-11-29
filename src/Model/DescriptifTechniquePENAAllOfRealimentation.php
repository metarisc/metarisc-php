<?php

namespace Metarisc\Model;

class DescriptifTechniquePENAAllOfRealimentation extends ModelAbstract
{
    private ?float $debit                 = null;
    private ?float $diametre_canalisation = null;
    private ?string $nature               = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var float $data['debit'] */
        $object->setDebit($data['debit']);

        /** @var float $data['diametre_canalisation'] */
        $object->setDiametreCanalisation($data['diametre_canalisation']);

        /** @var string $data['nature'] */
        $object->setNature($data['nature']);

        return $object;
    }

    public function getDebit() : ?float
    {
        return $this->debit;
    }

    public function setDebit(float $debit = null) : void
    {
        $this->debit=$debit;
    }

    public function getDiametreCanalisation() : ?float
    {
        return $this->diametre_canalisation;
    }

    public function setDiametreCanalisation(float $diametre_canalisation = null) : void
    {
        $this->diametre_canalisation=$diametre_canalisation;
    }

    public function getNature() : ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature = null) : void
    {
        $this->nature=$nature;
    }
}
