<?php

namespace Metarisc\Model;

class Organisation
{
    private ?string $id       = null;
    private ?string $nom      = null;
    private ?string $logo_url = null;

    public function getId() : ?string
    {
        return $this->id;
    }

    public function setId(string $id) : void
    {
        $this->id=$id;
    }

    public function getNom() : ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom) : void
    {
        $this->nom=$nom;
    }

    public function getLogoUrl() : ?string
    {
        return $this->logo_url;
    }

    public function setLogoUrl(string $logo_url) : void
    {
        $this->logo_url=$logo_url;
    }
}
