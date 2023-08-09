<?php

namespace Metarisc\Models;

class Organisation
{
    private ?string $id       = null;
    private ?string $nom      = null;
    private ?string $logo_url = null;
    public function getId() : ?string
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id=$id;
    }

    public function getNom() : ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom=$nom;
    }

    public function getLogoUrl() : ?string
    {
        return $this->logo_url;
    }

    public function setLogoUrl(string $logo_url)
    {
        $this->logo_url=$logo_url;
    }
}
