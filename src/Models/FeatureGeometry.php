<?php

namespace Metarisc\Models;

class FeatureGeometry
{
    private ?string $type = null;
    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type=$type;
    }

    public function getBbox() : array
    {
        return $this->bbox;
    }

    public function setBbox(array $bbox)
    {
        $this->bbox=$bbox;
    }

    public function getCoordinates() : array
    {
        return $this->coordinates;
    }

    public function setCoordinates(array $coordinates)
    {
        $this->coordinates=$coordinates;
    }
}
