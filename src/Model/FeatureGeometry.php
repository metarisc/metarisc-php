<?php

namespace Metarisc\Model;

class FeatureGeometry
{
    private ?string $type       = null;
    private ?array $bbox        = null;
    private ?array $coordinates = null;

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type) : void
    {
        $this->type=$type;
    }

    public function getBbox() : ?array
    {
        return $this->bbox;
    }

    public function setBbox(array $bbox) : void
    {
        $this->bbox=$bbox;
    }

    public function getCoordinates() : ?array
    {
        return $this->coordinates;
    }

    public function setCoordinates(array $coordinates) : void
    {
        $this->coordinates=$coordinates;
    }
}
