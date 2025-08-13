<?php

namespace Metarisc\Model;

/*
 * Représentation d'un membre amené à siéger au sein d'une commission.
*/

class CommissionMembre extends ModelAbstract
{
    private ?string $id                             = null;
    private ?string $titre                          = null;
    private ?bool $presence_obligatoire             = null;
    private ?\Metarisc\Model\Commission $commission = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['titre'] */
        $object->setTitre($data['titre']);

        /** @var bool $data['presence_obligatoire'] */
        $object->setPresenceObligatoire($data['presence_obligatoire']);

        /** @var array<array-key, mixed> $data['commission'] */
        $object->setCommission($data['commission']);

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

    public function getTitre() : ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre = null) : void
    {
        $this->titre=$titre;
    }

    public function getPresenceObligatoire() : ?bool
    {
        return $this->presence_obligatoire;
    }

    public function setPresenceObligatoire(bool $presence_obligatoire = null) : void
    {
        $this->presence_obligatoire=$presence_obligatoire;
    }

    public function getCommission() : ?Commission
    {
        return $this->commission;
    }

    public function setCommission(array $commission) : void
    {
        $this->commission=Commission::unserialize($commission);
    }
}
