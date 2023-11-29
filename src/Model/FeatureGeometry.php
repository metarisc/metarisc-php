<?php

namespace Metarisc\Model;

class FeatureGeometry extends ModelAbstract
{
    private ?string $type       = null;
    private ?array $bbox        = null;
    private ?array $coordinates = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var float[] $data['bbox'] */
        $object->setBbox($data['bbox']);

        /** @var float[] $data['coordinates'] */
        $object->setCoordinates($data['coordinates']);

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

    public function getBbox() : ?array
    {
        return $this->bbox;
    }

    public function setBbox(array $bbox = null) : void
    {
        $this->bbox=$bbox;
    }

    public function getCoordinates() : ?array
    {
        return $this->coordinates;
    }

    public function setCoordinates(array $coordinates = null) : void
    {
        $this->coordinates=$coordinates;
    }
}
