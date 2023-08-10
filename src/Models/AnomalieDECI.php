<?php

namespace Metarisc\Models;

class AnomalieDECI
{
    private ?string $code           = null;
    private ?string $texte          = null;
    private ?int $indice_de_gravite = null;
    public function getCode() : ?string
    {
        return $this->code;
    }

    public function setCode(string $code) : void
    {
        $this->code=$code;
    }

    public function getTexte() : ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte) : void
    {
        $this->texte=$texte;
    }

    public function getIndiceDeGravite() : ?int
    {
        return $this->indice_de_gravite;
    }

    public function setIndiceDeGravite(int $indice_de_gravite) : void
    {
        $this->indice_de_gravite=$indice_de_gravite;
    }
}
