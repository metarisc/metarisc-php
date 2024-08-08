<?php

namespace Metarisc\Model;

/*
 * Un géoservice est un service web pour représenter des informations géographiques lié à une organisation. Les géoservices sont basés sur les standards OGC (https://www.ogc.org).
*/

class ObjetOrganisationGeoservice extends ModelAbstract
{
    private ?string $nom  = null;
    private ?string $type = null;
    private ?string $url  = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['nom'] */
        $object->setNom($data['nom']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var string $data['url'] */
        $object->setUrl($data['url']);

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
