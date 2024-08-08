<?php

namespace Metarisc\Model;

/*
 * Tournée DECI de base.
*/

class TourneeDeciBase extends ModelAbstract
{
    private ?string $id               = null;
    private ?string $libelle          = null;
    private ?string $description      = null;
    private ?string $date_de_creation = null;
    private ?string $type             = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['libelle'] */
        $object->setLibelle($data['libelle']);

        /** @var string $data['description'] */
        $object->setDescription($data['description']);

        /** @var string $data['date_de_creation'] */
        $object->setDateDeCreation($data['date_de_creation']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

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

    public function getLibelle() : ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle = null) : void
    {
        $this->libelle=$libelle;
    }

    public function getDescription() : ?string
    {
        return $this->description;
    }

    public function setDescription(string $description = null) : void
    {
        $this->description=$description;
    }

    public function getDateDeCreation() : ?string
    {
        return $this->date_de_creation;
    }

    public function setDateDeCreation(?string $date_de_creation) : void
    {
        $this->date_de_creation = $date_de_creation;
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
