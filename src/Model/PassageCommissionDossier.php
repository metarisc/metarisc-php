<?php

namespace Metarisc\Model;

class PassageCommissionDossier extends ModelAbstract
{
    private ?string $id                       = null;
    private ?\Metarisc\Model\Dossier $dossier = null;
    private ?\Metarisc\Model\Avis $avis       = null;
    private ?string $statut                   = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var array<array-key, mixed> $data['dossier'] */
        $object->setDossier($data['dossier']);

        /** @var array<array-key, mixed> $data['avis'] */
        $object->setAvis($data['avis']);

        /** @var string $data['statut'] */
        $object->setStatut($data['statut']);

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

    public function getAvis() : ?Avis
    {
        return $this->avis;
    }

    public function setAvis(array $avis) : void
    {
        $this->avis=Avis::unserialize($avis);
    }

    public function getStatut() : ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut = null) : void
    {
        $this->statut=$statut;
    }
}
