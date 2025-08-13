<?php

namespace Metarisc\Model;

/*
 * Un texte applicable est une référence à un texte réglementaire ou normatif qui s'applique à un ERP.
*/

class ObjetTexteApplicable extends ModelAbstract
{
    private ?string $texte = null;
    private ?string $type  = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['texte'] */
        $object->setTexte($data['texte']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        return $object;
    }

    public function getTexte() : ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte = null) : void
    {
        $this->texte=$texte;
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
