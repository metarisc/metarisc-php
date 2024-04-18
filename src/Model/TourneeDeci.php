<?php

namespace Metarisc\Model;

class TourneeDeci extends ModelAbstract
{
    private ?string $id            = null;
    private ?string $libelle       = null;
    private ?string $description   = null;
    private ?string $date_creation = null;
    private ?float $pourcentage    = null;
    private ?bool $est_terminee    = null;
    private ?string $date_de_debut = null;
    private ?string $date_de_fin   = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['libelle'] */
        $object->setLibelle($data['libelle']);

        /** @var string $data['description'] */
        $object->setDescription($data['description']);

        /** @var string $data['date_creation'] */
        $object->setDateCreation($data['date_creation']);

        /** @var float $data['pourcentage'] */
        $object->setPourcentage($data['pourcentage']);

        /** @var bool $data['est_terminee'] */
        $object->setEstTerminee($data['est_terminee']);

        /** @var string $data['date_de_debut'] */
        $object->setDateDeDebut($data['date_de_debut']);

        /** @var string $data['date_de_fin'] */
        $object->setDateDeFin($data['date_de_fin']);

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

    public function getDateCreation() : ?string
    {
        return $this->date_creation;
    }

    public function setDateCreation(?string $date_creation) : void
    {
        $this->date_creation = $date_creation;
    }

    public function getPourcentage() : ?float
    {
        return $this->pourcentage;
    }

    public function setPourcentage(float $pourcentage = null) : void
    {
        $this->pourcentage=$pourcentage;
    }

    public function getEstTerminee() : ?bool
    {
        return $this->est_terminee;
    }

    public function setEstTerminee(bool $est_terminee = null) : void
    {
        $this->est_terminee=$est_terminee;
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
}
