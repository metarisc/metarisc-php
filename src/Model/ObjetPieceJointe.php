<?php

namespace Metarisc\Model;

/*
 * Document représentant un fichier informatique stocké sur internet.
*/

class ObjetPieceJointe extends ModelAbstract
{
    private ?string $nom         = null;
    private ?string $description = null;
    private ?string $type        = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['nom'] */
        $object->setNom($data['nom']);

        /** @var string $data['description'] */
        $object->setDescription($data['description']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        return $object;
    }

    public function getNom() : ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom = null) : void
    {
        $this->nom=$nom;
    }

    public function getDescription() : ?string
    {
        return $this->description;
    }

    public function setDescription(string $description = null) : void
    {
        $this->description=$description;
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
