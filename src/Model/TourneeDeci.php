<?php

namespace Metarisc\Model;

class TourneeDeci extends ModelAbstract
{
    private ?string $id                                = null;
    private ?string $libelle                           = null;
    private ?string $description                       = null;
    private ?string $date_de_creation                  = null;
    private ?string $type                              = null;
    private ?float $pourcentage                        = null;
    private ?bool $est_terminee                        = null;
    private ?string $date_de_debut                     = null;
    private ?string $date_de_fin                       = null;
    private ?\Metarisc\Model\TourneeDeciModele $modele = null;
    private ?string $modele_id                         = null;
    private ?string $mois_debut                        = null;
    private ?string $mois_fin                          = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['libelle'] */
        $object->setLibelle($data['libelle']);

        /** @var string $data['description'] */
        $object->setDescription($data['description']);

        /** @var string $data['date_de_creation'] */
        $object->setDateDeCreation($data['date_de_creation']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var float $data['pourcentage'] */
        $object->setPourcentage($data['pourcentage']);

        /** @var bool $data['est_terminee'] */
        $object->setEstTerminee($data['est_terminee']);

        /** @var string $data['date_de_debut'] */
        $object->setDateDeDebut($data['date_de_debut']);

        /** @var string $data['date_de_fin'] */
        $object->setDateDeFin($data['date_de_fin']);

        /** @var array<array-key, mixed> $data['modele'] */
        $object->setModele($data['modele']);

        /** @var string $data['modele_id'] */
        $object->setModeleId($data['modele_id']);

        /** @var string $data['mois_debut'] */
        $object->setMoisDebut($data['mois_debut']);

        /** @var string $data['mois_fin'] */
        $object->setMoisFin($data['mois_fin']);

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

    public function getDateDeCreation() : ?string
    {
        return $this->date_de_creation;
    }

    public function setDateDeCreation(?string $date_de_creation) : void
    {
        $this->date_de_creation = $date_de_creation;
    }

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
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

    public function getModele() : ?TourneeDeciModele
    {
        return $this->modele;
    }

    public function setModele(array $modele) : void
    {
        $this->modele=TourneeDeciModele::unserialize($modele);
    }

    public function getModeleId() : ?string
    {
        return $this->modele_id;
    }

    public function setModeleId(string $modele_id = null) : void
    {
        $this->modele_id=$modele_id;
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
