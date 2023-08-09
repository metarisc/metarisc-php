<?php

namespace Metarisc\Models;

class GetFeature200ResponseCrs
{
    private ?string $type                                                    = null;
    private ?\Metarisc\Models\GetFeature200ResponseCrsProperties $properties = null;
    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type=$type;
    }

    public function getProperties() : ?GetFeature200ResponseCrsProperties
    {
        return $this->properties;
    }

    public function setProperties(GetFeature200ResponseCrsProperties $properties)
    {
        $this->properties=$properties;
    }
}
