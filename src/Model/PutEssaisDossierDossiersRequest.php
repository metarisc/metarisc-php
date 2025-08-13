<?php

namespace Metarisc\Model;

class PutEssaisDossierDossiersRequest extends ModelAbstract
{
    private ?array $essais = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var \Metarisc\Model\ObjetEssai[] $data['essais'] */
        $object->setEssais($data['essais']);

        return $object;
    }

    public function getEssais() : ?array
    {
        return $this->essais;
    }

    public function setEssais(array $essais = null) : void
    {
        $this->essais=$essais;
    }
}
