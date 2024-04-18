<?php

namespace Metarisc\Model;

class Avis extends ModelAbstract
{
    private ?string $avis_exploitation = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['avis_exploitation'] */
        $object->setAvisExploitation($data['avis_exploitation']);

        return $object;
    }

    public function getAvisExploitation() : ?string
    {
        return $this->avis_exploitation;
    }

    public function setAvisExploitation(string $avis_exploitation = null) : void
    {
        $this->avis_exploitation=$avis_exploitation;
    }
}
