<?php

namespace Metarisc\Model;

/*
 * Représente une date de passage en commission.
*/

class PassageCommission extends ModelAbstract
{
    private ?string $id                             = null;
    private ?string $date_debut                     = null;
    private ?string $date_fin                       = null;
    private ?string $type                           = null;
    private ?string $libelle                        = null;
    private ?string $raison_reprogrammation         = null;
    private ?int $nb_dossiers                       = null;
    private ?\Metarisc\Model\Commission $commission = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['date_debut'] */
        $object->setDateDebut($data['date_debut']);

        /** @var string $data['date_fin'] */
        $object->setDateFin($data['date_fin']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var string $data['libelle'] */
        $object->setLibelle($data['libelle']);

        /** @var string $data['raison_reprogrammation'] */
        $object->setRaisonReprogrammation($data['raison_reprogrammation']);

        /** @var int $data['nb_dossiers'] */
        $object->setNbDossiers($data['nb_dossiers']);

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

    public function getDateDebut() : ?string
    {
        return $this->date_debut;
    }

    public function setDateDebut(?string $date_debut) : void
    {
        $this->date_debut = $date_debut;
    }

    public function getDateFin() : ?string
    {
        return $this->date_fin;
    }

    public function setDateFin(?string $date_fin) : void
    {
        $this->date_fin = $date_fin;
    }

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
    }

    public function getLibelle() : ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle = null) : void
    {
        $this->libelle=$libelle;
    }

    public function getRaisonReprogrammation() : ?string
    {
        return $this->raison_reprogrammation;
    }

    public function setRaisonReprogrammation(string $raison_reprogrammation = null) : void
    {
        $this->raison_reprogrammation=$raison_reprogrammation;
    }

    public function getNbDossiers() : ?int
    {
        return $this->nb_dossiers;
    }

    public function setNbDossiers(int $nb_dossiers = null) : void
    {
        $this->nb_dossiers=$nb_dossiers;
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
