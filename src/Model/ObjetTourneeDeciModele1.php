<?php

namespace Metarisc\Model;

/*
 * Modèle de tournée DECI permettant une programmation cyclique.
*/

class ObjetTourneeDeciModele1 extends ModelAbstract
{
    private ?string $libelle     = null;
    private ?string $description = null;
    private ?string $type        = null;
    private ?int $mois_debut     = null;
    private ?int $mois_fin       = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['libelle'] */
        $object->setLibelle($data['libelle']);

        /** @var string $data['description'] */
        $object->setDescription($data['description']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var int $data['mois_debut'] */
        $object->setMoisDebut($data['mois_debut']);

        /** @var int $data['mois_fin'] */
        $object->setMoisFin($data['mois_fin']);

        return $object;
    }

    public function getLibelle() : ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle = null) : void
    {
        $this->libelle=$libelle;
    }

    public function getDescription() : ?string
    {
        return $this->description;
    }

    public function setDescription(string $description = null) : void
    {
        $this->description=$description;
    }

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
    }

    public function getMoisDebut() : ?int
    {
        return $this->mois_debut;
    }

    public function setMoisDebut(int $mois_debut = null) : void
    {
        $this->mois_debut=$mois_debut;
    }

    public function getMoisFin() : ?int
    {
        return $this->mois_fin;
    }

    public function setMoisFin(int $mois_fin = null) : void
    {
        $this->mois_fin=$mois_fin;
    }
}
