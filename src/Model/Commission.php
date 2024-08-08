<?php

namespace Metarisc\Model;

/*
 * Une commission est un organisme compétent pour donner des avis.
*/

class Commission extends ModelAbstract
{
    private ?string $id      = null;
    private ?string $type    = null;
    private ?string $libelle = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var string $data['libelle'] */
        $object->setLibelle($data['libelle']);

        return $object;
    }

    public function getId() : ?string
    {
        return $this->id;
    }

    public function setId(string $id = null) : void
    {
        $this->id=$id;
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
