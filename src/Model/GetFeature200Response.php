<?php

namespace Metarisc\Model;

class GetFeature200Response
{
    private ?string $type                                  = null;
    private ?\Metarisc\Model\GetFeature200ResponseCrs $crs = null;
    private ?array $features                               = null;

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type) : void
    {
        $this->type=$type;
    }

    public function getCrs() : ?GetFeature200ResponseCrs
    {
        return $this->crs;
    }

    public function setCrs(GetFeature200ResponseCrs $crs) : void
    {
        $this->crs=$crs;
    }

    public function getFeatures() : ?array
    {
        return $this->features;
    }

    public function setFeatures(array $features) : void
    {
        $this->features=$features;
    }
}
