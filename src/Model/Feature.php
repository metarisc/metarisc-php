<?php

namespace Metarisc\Model;

class Feature
{
    private ?string $type                              = null;
    private ?array $properties                         = null;
    private ?\Metarisc\Model\FeatureGeometry $geometry = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var array $data['properties'] */
        $object->setProperties($data['properties']);

        /** @var array<array-key, mixed> $data['geometry'] */
        $object->setGeometry($data['geometry']);

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

    public function getProperties() : ?array
    {
        return $this->properties;
    }

    public function setProperties(array $properties = null) : void
    {
        $this->properties=$properties;
    }

    public function getGeometry() : ?FeatureGeometry
    {
        return $this->geometry;
    }

    public function setGeometry(array $geometry) : void
    {
        $this->geometry=\Metarisc\Model\FeatureGeometry::unserialize($geometry);
    }
}
