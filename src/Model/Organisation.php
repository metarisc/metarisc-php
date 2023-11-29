<?php

namespace Metarisc\Model;

class Organisation extends ModelAbstract
{
    private ?string $id       = null;
    private ?string $nom      = null;
    private ?string $logo_url = null;
    private ?string $type     = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['nom'] */
        $object->setNom($data['nom']);

        /** @var string $data['logo_url'] */
        $object->setLogoUrl($data['logo_url']);

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

    public function getNom() : ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom = null) : void
    {
        $this->nom=$nom;
    }

    public function getLogoUrl() : ?string
    {
        return $this->logo_url;
    }

    public function setLogoUrl(string $logo_url = null) : void
    {
        $this->logo_url=$logo_url;
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
