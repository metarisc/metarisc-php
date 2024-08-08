<?php

namespace Metarisc\Model;

class ObjetTournEDeciPEIListeAnomaliesInner extends ModelAbstract
{
    private ?int $code     = null;
    private ?bool $a_lever = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var int $data['code'] */
        $object->setCode($data['code']);

        /** @var bool $data['a_lever'] */
        $object->setALever($data['a_lever']);

        return $object;
    }

    public function getCode() : ?int
    {
        return $this->code;
    }

    public function setCode(int $code = null) : void
    {
        $this->code=$code;
    }

    public function getALever() : ?bool
    {
        return $this->a_lever;
    }

    public function setALever(bool $a_lever = null) : void
    {
        $this->a_lever=$a_lever;
    }
}
