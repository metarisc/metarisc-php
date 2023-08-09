<?php

namespace Metarisc\Models;

class GetFeature200Response
{
    private ?string $type                                   = null;
    private ?\Metarisc\Models\GetFeature200ResponseCrs $crs = null;
    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type=$type;
    }

    public function getCrs() : ?GetFeature200ResponseCrs
    {
        return $this->crs;
    }

    public function setCrs(GetFeature200ResponseCrs $crs)
    {
        $this->crs=$crs;
    }

    public function getFeatures() : array
    {
        return $this->features;
    }

    public function setFeatures(array $features)
    {
        $this->features=$features;
    }
}
