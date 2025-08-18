<?php

namespace Metarisc\Model;

/*
 * Une enveloppe permet de lier un ensemble de dossiers à traiter.
*/

class ObjetEnveloppe extends ModelAbstract
{
    private ?string $titre = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['titre'] */
        $object->setTitre($data['titre']);

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
}
