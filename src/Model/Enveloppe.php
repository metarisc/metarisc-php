<?php

namespace Metarisc\Model;

/*
 * Une enveloppe permet de lier un ensemble de dossiers à traiter.
*/

class Enveloppe extends ModelAbstract
{
    private ?string $id       = null;
    private ?string $titre    = null;
    private ?int $nb_dossiers = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['titre'] */
        $object->setTitre($data['titre']);

        /** @var int $data['nb_dossiers'] */
        $object->setNbDossiers($data['nb_dossiers']);

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

    public function getNbDossiers() : ?int
    {
        return $this->nb_dossiers;
    }

    public function setNbDossiers(int $nb_dossiers = null) : void
    {
        $this->nb_dossiers=$nb_dossiers;
    }
}
