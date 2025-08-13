<?php

namespace Metarisc\Model;

/*
 * Permission associée à un ERP Metarisc.
*/

class PermissionErp extends ModelAbstract
{
    private ?string $name = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['name'] */
        $object->setName($data['name']);

        return $object;
    }

    public function getName() : ?string
    {
        return $this->name;
    }

    public function setName(string $name = null) : void
    {
        $this->name=$name;
    }
}
