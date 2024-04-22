<?php

namespace Metarisc\Model;

class AnomalieDECI extends ModelAbstract
{
    private ?int $code              = null;
    private ?string $texte          = null;
    private ?int $indice_de_gravite = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var int $data['code'] */
        $object->setCode($data['code']);

        /** @var string $data['texte'] */
        $object->setTexte($data['texte']);

        /** @var int $data['indice_de_gravite'] */
        $object->setIndiceDeGravite($data['indice_de_gravite']);

        return $object;
    }

    public function getCode() : ?int
    {
        return $this->code;
    }

    public function setCode(int $code = null) : void
    {
        $this->code=$code;
    }

    public function getTexte() : ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte = null) : void
    {
        $this->texte=$texte;
    }

    public function getIndiceDeGravite() : ?int
    {
        return $this->indice_de_gravite;
    }

    public function setIndiceDeGravite(int $indice_de_gravite = null) : void
    {
        $this->indice_de_gravite=$indice_de_gravite;
    }
}
