<?php

namespace Metarisc\Model;

class DescriptifTechniquePENA extends DescriptifTechniqueDECIBase
{
    private ?string $nature = null;
    private ?float $volume  = null;

    public function getNature() : ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature) : void
    {
        $this->nature=$nature;
    }

    public function getVolume() : ?float
    {
        return $this->volume;
    }

    public function setVolume(float $volume) : void
    {
        $this->volume=$volume;
    }
}
