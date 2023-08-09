<?php

namespace Metarisc\Models;

class Type
{
    private ?string $id        = null;
    private ?string $titre     = null;
    private ?string $categorie = null;
    public function getId() : ?string
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id=$id;
    }

    public function getTitre() : ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre)
    {
        $this->titre=$titre;
    }

    public function getCategorie() : ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie)
    {
        $this->categorie=$categorie;
    }
}
