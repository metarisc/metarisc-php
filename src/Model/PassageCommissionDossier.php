<?php

namespace Metarisc\Model;

class PassageCommissionDossier extends ModelAbstract
{
    private ?string $id                       = null;
    private ?\Metarisc\Model\Dossier $dossier = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var array<array-key, mixed> $data['dossier'] */
        $object->setDossier($data['dossier']);

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

    public function getDossier() : ?Dossier
    {
        return $this->dossier;
    }

    public function setDossier(array $dossier) : void
    {
        $this->dossier=Dossier::unserialize($dossier);
    }
}
