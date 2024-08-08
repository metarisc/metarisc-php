<?php

namespace Metarisc\Model;

/*
 * Une commission est un organisme compétent pour donner des avis.
*/

class ObjetCommission extends ModelAbstract
{
    private ?string $type    = null;
    private ?string $libelle = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var string $data['libelle'] */
        $object->setLibelle($data['libelle']);

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

    public function getLibelle() : ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle = null) : void
    {
        $this->libelle=$libelle;
    }
}
