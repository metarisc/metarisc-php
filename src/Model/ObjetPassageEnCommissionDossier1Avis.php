<?php

namespace Metarisc\Model;

/*
 * Avis rendu de la commission sur le dossier.
*/

class ObjetPassageEnCommissionDossier1Avis extends ModelAbstract
{
    private ?string $type = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['type'] */
        $object->setType($data['type']);

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
}
