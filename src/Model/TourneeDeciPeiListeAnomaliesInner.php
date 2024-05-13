<?php

namespace Metarisc\Model;

class TourneeDeciPeiListeAnomaliesInner extends ModelAbstract
{
    private ?\Metarisc\Model\AnomalieDECI $anomalie = null;
    private ?bool $a_lever                          = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var array<array-key, mixed> $data['anomalie'] */
        $object->setAnomalie($data['anomalie']);

        /** @var bool $data['a_lever'] */
        $object->setALever($data['a_lever']);

        return $object;
    }

    public function getAnomalie() : ?AnomalieDECI
    {
        return $this->anomalie;
    }

    public function setAnomalie(array $anomalie) : void
    {
        $this->anomalie=AnomalieDECI::unserialize($anomalie);
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
