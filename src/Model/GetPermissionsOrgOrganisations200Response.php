<?php

namespace Metarisc\Model;

class GetPermissionsOrgOrganisations200Response extends ModelAbstract
{
    private ?array $data = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var \Metarisc\Model\PermissionOrg[] $data['data'] */
        $object->setData($data['data']);

        return $object;
    }

    public function getData() : ?array
    {
        return $this->data;
    }

    public function setData(array $data = null) : void
    {
        $this->data=$data;
    }
}
