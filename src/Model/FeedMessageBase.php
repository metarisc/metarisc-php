<?php

namespace Metarisc\Model;

/*
 * Message de base d'un flux d'activité.
*/

class FeedMessageBase extends ModelAbstract
{
    private ?string $id               = null;
    private ?string $titre            = null;
    private ?string $date_de_creation = null;
    private ?string $type             = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['titre'] */
        $object->setTitre($data['titre']);

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

    public function getTitre() : ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre = null) : void
    {
        $this->titre=$titre;
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
