<?php

namespace Metarisc\Model;

/*
 * Une commission est un organisme compétent pour donner des avis.
*/

class Commission extends ModelAbstract
{
    private ?string $id                                = null;
    private ?string $type                              = null;
    private ?string $libelle                           = null;
    private ?\Metarisc\Model\Organisation $presidence  = null;
    private ?\Metarisc\Model\Organisation $secretariat = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var string $data['libelle'] */
        $object->setLibelle($data['libelle']);

        /** @var array<array-key, mixed> $data['presidence'] */
        $object->setPresidence($data['presidence']);

        /** @var array<array-key, mixed> $data['secretariat'] */
        $object->setSecretariat($data['secretariat']);

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

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
    }

    public function getLibelle() : ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle = null) : void
    {
        $this->libelle=$libelle;
    }

    public function getPresidence() : ?Organisation
    {
        return $this->presidence;
    }

    public function setPresidence(array $presidence) : void
    {
        $this->presidence=Organisation::unserialize($presidence);
    }

    public function getSecretariat() : ?Organisation
    {
        return $this->secretariat;
    }

    public function setSecretariat(array $secretariat) : void
    {
        $this->secretariat=Organisation::unserialize($secretariat);
    }
}
