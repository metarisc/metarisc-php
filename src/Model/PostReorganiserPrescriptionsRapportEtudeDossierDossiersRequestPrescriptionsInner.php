<?php

namespace Metarisc\Model;

class PostReorganiserPrescriptionsRapportEtudeDossierDossiersRequestPrescriptionsInner extends ModelAbstract
{
    private ?string $id  = null;
    private ?int $numero = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var int $data['numero'] */
        $object->setNumero($data['numero']);

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

    public function getNumero() : ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero = null) : void
    {
        $this->numero=$numero;
    }
}
