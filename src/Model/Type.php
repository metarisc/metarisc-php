<?php

namespace Metarisc\Model;

class Type extends ModelAbstract
{
    private ?string $id        = null;
    private ?string $titre     = null;
    private ?string $categorie = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['titre'] */
        $object->setTitre($data['titre']);

        /** @var string $data['categorie'] */
        $object->setCategorie($data['categorie']);

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

    public function getCategorie() : ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie = null) : void
    {
        $this->categorie=$categorie;
    }
}
