<?php

namespace Metarisc\Model;

/*
 * Descriptif technique de base pour l'ensemble des PEI.
*/

class DescriptifTechniqueDECIBase extends ModelAbstract
{
    private ?string $id                     = null;
    private ?string $type                   = null;
    private ?bool $est_reglementaire        = null;
    private ?string $domanialite            = null;
    private ?bool $est_conforme_rddeci      = null;
    private ?int $performance_theorique     = null;
    private ?int $performance_reelle        = null;
    private ?string $observations_generales = null;
    private ?string $date                   = null;
    private ?string $statut                 = null;
    private ?bool $est_disponible           = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var bool $data['est_reglementaire'] */
        $object->setEstReglementaire($data['est_reglementaire']);

        /** @var string $data['domanialite'] */
        $object->setDomanialite($data['domanialite']);

        /** @var bool $data['est_conforme_rddeci'] */
        $object->setEstConformeRddeci($data['est_conforme_rddeci']);

        /** @var int $data['performance_theorique'] */
        $object->setPerformanceTheorique($data['performance_theorique']);

        /** @var int $data['performance_reelle'] */
        $object->setPerformanceReelle($data['performance_reelle']);

        /** @var string $data['observations_generales'] */
        $object->setObservationsGenerales($data['observations_generales']);

        /** @var string $data['date'] */
        $object->setDate($data['date']);

        /** @var string $data['statut'] */
        $object->setStatut($data['statut']);

        /** @var bool $data['est_disponible'] */
        $object->setEstDisponible($data['est_disponible']);

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

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
    }

    public function getEstReglementaire() : ?bool
    {
        return $this->est_reglementaire;
    }

    public function setEstReglementaire(bool $est_reglementaire = null) : void
    {
        $this->est_reglementaire=$est_reglementaire;
    }

    public function getDomanialite() : ?string
    {
        return $this->domanialite;
    }

    public function setDomanialite(string $domanialite = null) : void
    {
        $this->domanialite=$domanialite;
    }

    public function getEstConformeRddeci() : ?bool
    {
        return $this->est_conforme_rddeci;
    }

    public function setEstConformeRddeci(bool $est_conforme_rddeci = null) : void
    {
        $this->est_conforme_rddeci=$est_conforme_rddeci;
    }

    public function getPerformanceTheorique() : ?int
    {
        return $this->performance_theorique;
    }

    public function setPerformanceTheorique(int $performance_theorique = null) : void
    {
        $this->performance_theorique=$performance_theorique;
    }

    public function getPerformanceReelle() : ?int
    {
        return $this->performance_reelle;
    }

    public function setPerformanceReelle(int $performance_reelle = null) : void
    {
        $this->performance_reelle=$performance_reelle;
    }

    public function getObservationsGenerales() : ?string
    {
        return $this->observations_generales;
    }

    public function setObservationsGenerales(string $observations_generales = null) : void
    {
        $this->observations_generales=$observations_generales;
    }

    public function getDate() : ?string
    {
        return $this->date;
    }

    public function setDate(?string $date) : void
    {
        $this->date = $date;
    }

    public function getStatut() : ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut = null) : void
    {
        $this->statut=$statut;
    }

    public function getEstDisponible() : ?bool
    {
        return $this->est_disponible;
    }

    public function setEstDisponible(bool $est_disponible = null) : void
    {
        $this->est_disponible=$est_disponible;
    }
}
