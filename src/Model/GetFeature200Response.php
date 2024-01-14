<?php

namespace Metarisc\Model;

class GetFeature200Response extends ModelAbstract
{
    private ?string $type                                  = null;
    private ?\Metarisc\Model\GetFeature200ResponseCrs $crs = null;
    private ?array $features                               = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var array<array-key, mixed> $data['crs'] */
        $object->setCrs($data['crs']);

        /** @var \Metarisc\Model\Feature[] $data['features'] */
        $object->setFeatures($data['features']);

        return $object;
    }

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
    }

    public function getCrs() : ?GetFeature200ResponseCrs
    {
        return $this->crs;
    }

    public function setCrs(array $crs) : void
    {
        $this->crs=GetFeature200ResponseCrs::unserialize($crs);
    }

    public function getFeatures() : ?array
    {
        return $this->features;
    }

    public function setFeatures(array $features = null) : void
    {
        $this->features=$features;
    }
}
