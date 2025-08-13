<?php

namespace Metarisc\Model;

/*
 * Représentation d'un membre amené à siéger au sein d'une commission.
*/

class ObjetCommissionMembre1 extends ModelAbstract
{
    private ?string $titre              = null;
    private ?bool $presence_obligatoire = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['titre'] */
        $object->setTitre($data['titre']);

        /** @var bool $data['presence_obligatoire'] */
        $object->setPresenceObligatoire($data['presence_obligatoire']);

        return $object;
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
}
