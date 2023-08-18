<?php

namespace Metarisc\Model;

class GetFeature200ResponseCrs
{
    private ?string $type                                                   = null;
    private ?\Metarisc\Model\GetFeature200ResponseCrsProperties $properties = null;

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type) : void
    {
        $this->type=$type;
    }

    public function getProperties() : ?GetFeature200ResponseCrsProperties
    {
        return $this->properties;
    }

    public function setProperties(GetFeature200ResponseCrsProperties $properties) : void
    {
        $this->properties=$properties;
    }
}
