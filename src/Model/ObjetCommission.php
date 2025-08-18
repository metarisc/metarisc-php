<?php

namespace Metarisc\Model;

/*
 * Une commission est un organisme compétent pour donner des avis.
*/

class ObjetCommission extends ModelAbstract
{
    private ?string $type           = null;
    private ?string $libelle        = null;
    private ?string $presidence_id  = null;
    private ?string $secretariat_id = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var string $data['libelle'] */
        $object->setLibelle($data['libelle']);

        /** @var string $data['presidence_id'] */
        $object->setPresidenceId($data['presidence_id']);

        /** @var string $data['secretariat_id'] */
        $object->setSecretariatId($data['secretariat_id']);

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

    public function getLibelle() : ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle = null) : void
    {
        $this->libelle=$libelle;
    }

    public function getPresidenceId() : ?string
    {
        return $this->presidence_id;
    }

    public function setPresidenceId(string $presidence_id = null) : void
    {
        $this->presidence_id=$presidence_id;
    }

    public function getSecretariatId() : ?string
    {
        return $this->secretariat_id;
    }

    public function setSecretariatId(string $secretariat_id = null) : void
    {
        $this->secretariat_id=$secretariat_id;
    }
}
