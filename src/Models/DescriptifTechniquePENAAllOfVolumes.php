<?php

namespace Metarisc\Models;

class DescriptifTechniquePENAAllOfVolumes
{
    private ?float $reel      = null;
    private ?float $theorique = null;
    public function getReel() : ?float
    {
        return $this->reel;
    }

    public function setReel(float $reel) : void
    {
        $this->reel=$reel;
    }

    public function getTheorique() : ?float
    {
        return $this->theorique;
    }

    public function setTheorique(float $theorique) : void
    {
        $this->theorique=$theorique;
    }
}
