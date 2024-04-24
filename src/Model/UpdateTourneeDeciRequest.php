<?php

namespace Metarisc\Model;

class UpdateTourneeDeciRequest extends ModelAbstract
{
    private ?string $libelle       = null;
    private ?string $description   = null;
    private ?string $date_de_debut = null;
    private ?string $date_de_fin   = null;
    private ?string $mois_debut    = null;
    private ?string $mois_fin      = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['libelle'] */
        $object->setLibelle($data['libelle']);

        /** @var string $data['description'] */
        $object->setDescription($data['description']);

        /** @var string $data['date_de_debut'] */
        $object->setDateDeDebut($data['date_de_debut']);

        /** @var string $data['date_de_fin'] */
        $object->setDateDeFin($data['date_de_fin']);

        /** @var string $data['mois_debut'] */
        $object->setMoisDebut($data['mois_debut']);

        /** @var string $data['mois_fin'] */
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

    public function getDateDeDebut() : ?string
    {
        return $this->date_de_debut;
    }

    public function setDateDeDebut(?string $date_de_debut) : void
    {
        $this->date_de_debut = $date_de_debut;
    }

    public function getDateDeFin() : ?string
    {
        return $this->date_de_fin;
    }

    public function setDateDeFin(?string $date_de_fin) : void
    {
        $this->date_de_fin = $date_de_fin;
    }

    public function getMoisDebut() : ?string
    {
        return $this->mois_debut;
    }

    public function setMoisDebut(string $mois_debut = null) : void
    {
        $this->mois_debut=$mois_debut;
    }

    public function getMoisFin() : ?string
    {
        return $this->mois_fin;
    }

    public function setMoisFin(string $mois_fin = null) : void
    {
        $this->mois_fin=$mois_fin;
    }
}
