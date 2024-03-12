<?php

namespace Metarisc\Model;

class OrganisationGeoservice extends ModelAbstract
{
    private ?string $id              = null;
    private ?string $organisation_id = null;
    private ?string $nom             = null;
    private ?string $type            = null;
    private ?string $url             = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['organisation_id'] */
        $object->setOrganisationId($data['organisation_id']);

        /** @var string $data['nom'] */
        $object->setNom($data['nom']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var string $data['url'] */
        $object->setUrl($data['url']);

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

    public function getOrganisationId() : ?string
    {
        return $this->organisation_id;
    }

    public function setOrganisationId(string $organisation_id = null) : void
    {
        $this->organisation_id=$organisation_id;
    }

    public function getNom() : ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom = null) : void
    {
        $this->nom=$nom;
    }

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
    }

    public function getUrl() : ?string
    {
        return $this->url;
    }

    public function setUrl(string $url = null) : void
    {
        $this->url=$url;
    }
}
