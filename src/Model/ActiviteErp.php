<?php

namespace Metarisc\Model;

class ActiviteErp extends ModelAbstract
{
    private ?string $type     = null;
    private ?string $activite = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var string $data['activite'] */
        $object->setActivite($data['activite']);

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

    public function getActivite() : ?string
    {
        return $this->activite;
    }

    public function setActivite(string $activite = null) : void
    {
        $this->activite=$activite;
    }
}
