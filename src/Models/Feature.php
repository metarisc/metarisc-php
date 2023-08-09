<?php

namespace Metarisc\Models;

class Feature
{
    private ?string $type                               = null;
    private ?object $properties                         = null;
    private ?\Metarisc\Models\FeatureGeometry $geometry = null;
    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type=$type;
    }

    public function getProperties() : ?object
    {
        return $this->properties;
    }

    public function setProperties(object $properties)
    {
        $this->properties=$properties;
    }

    public function getGeometry() : ?FeatureGeometry
    {
        return $this->geometry;
    }

    public function setGeometry(FeatureGeometry $geometry)
    {
        $this->geometry=$geometry;
    }
}
