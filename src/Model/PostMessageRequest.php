<?php

namespace Metarisc\Model;

class PostMessageRequest extends ModelAbstract
{
    private ?string $type  = null;
    private ?string $titre = null;
    private ?string $texte = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var string $data['titre'] */
        $object->setTitre($data['titre']);

        /** @var string $data['texte'] */
        $object->setTexte($data['texte']);

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

    public function getTitre() : ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre = null) : void
    {
        $this->titre=$titre;
    }

    public function getTexte() : ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte = null) : void
    {
        $this->texte=$texte;
    }
}
