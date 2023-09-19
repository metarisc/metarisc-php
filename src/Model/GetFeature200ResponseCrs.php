<?php

namespace Metarisc\Model;

class GetFeature200ResponseCrs
{
    private ?string $type                                                   = null;
    private ?\Metarisc\Model\GetFeature200ResponseCrsProperties $properties = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var array<array-key, mixed> $data['properties'] */
        $object->setProperties($data['properties']);

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

    public function getProperties() : ?GetFeature200ResponseCrsProperties
    {
        return $this->properties;
    }

    public function setProperties(array $properties) : void
    {
        $this->properties=\Metarisc\Model\GetFeature200ResponseCrsProperties::unserialize($properties);
    }
}
