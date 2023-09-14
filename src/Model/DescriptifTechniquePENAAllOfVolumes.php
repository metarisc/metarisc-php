<?php

namespace Metarisc\Model;

class DescriptifTechniquePENAAllOfVolumes
{
    private ?float $reel      = null;
    private ?float $theorique = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var float $data['reel'] */
        $object->setReel($data['reel']);

        /** @var float $data['theorique'] */
        $object->setTheorique($data['theorique']);

        return $object;
    }

    public function getReel() : ?float
    {
        return $this->reel;
    }

    public function setReel(float $reel = null) : void
    {
        $this->reel=$reel;
    }

    public function getTheorique() : ?float
    {
        return $this->theorique;
    }

    public function setTheorique(float $theorique = null) : void
    {
        $this->theorique=$theorique;
    }
}
