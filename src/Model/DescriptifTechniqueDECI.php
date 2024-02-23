<?php

namespace Metarisc\Model;

class DescriptifTechniqueDECI extends ModelAbstract
{
    private ?string $id                     = null;
    private ?string $type                   = null;
    private ?array $anomalies               = null;
    private ?bool $est_reglementaire        = null;
    private ?string $domanialite            = null;
    private ?bool $est_conforme_rddeci      = null;
    private ?int $performance_theorique     = null;
    private ?int $performance_reelle        = null;
    private ?string $observations_generales = null;
    private ?string $date                   = null;
    private ?string $statut                 = null;
    private ?bool $est_disponible           = null;
    private ?float $surpression             = null;
    private ?string $nature                 = null;
    private ?float $debit_1bar              = null;
    private ?float $pression                = null;
    private ?float $pression_statique       = null;
    private ?float $debit_gueule_bee        = null;
    private ?float $volume                  = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var \Metarisc\Model\AnomaliePEI[] $data['anomalies'] */
        $object->setAnomalies($data['anomalies']);

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

        /** @var float $data['surpression'] */
        $object->setSurpression($data['surpression']);

        /** @var string $data['nature'] */
        $object->setNature($data['nature']);

        /** @var float $data['debit_1bar'] */
        $object->setDebit1bar($data['debit_1bar']);

        /** @var float $data['pression'] */
        $object->setPression($data['pression']);

        /** @var float $data['pression_statique'] */
        $object->setPressionStatique($data['pression_statique']);

        /** @var float $data['debit_gueule_bee'] */
        $object->setDebitGueuleBee($data['debit_gueule_bee']);

        /** @var float $data['volume'] */
        $object->setVolume($data['volume']);

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

    public function getAnomalies() : ?array
    {
        return $this->anomalies;
    }

    public function setAnomalies(array $anomalies = null) : void
    {
        $this->anomalies=$anomalies;
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

    public function getSurpression() : ?float
    {
        return $this->surpression;
    }

    public function setSurpression(float $surpression = null) : void
    {
        $this->surpression=$surpression;
    }

    public function getNature() : ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature = null) : void
    {
        $this->nature=$nature;
    }

    public function getDebit1bar() : ?float
    {
        return $this->debit_1bar;
    }

    public function setDebit1bar(float $debit_1bar = null) : void
    {
        $this->debit_1bar=$debit_1bar;
    }

    public function getPression() : ?float
    {
        return $this->pression;
    }

    public function setPression(float $pression = null) : void
    {
        $this->pression=$pression;
    }

    public function getPressionStatique() : ?float
    {
        return $this->pression_statique;
    }

    public function setPressionStatique(float $pression_statique = null) : void
    {
        $this->pression_statique=$pression_statique;
    }

    public function getDebitGueuleBee() : ?float
    {
        return $this->debit_gueule_bee;
    }

    public function setDebitGueuleBee(float $debit_gueule_bee = null) : void
    {
        $this->debit_gueule_bee=$debit_gueule_bee;
    }

    public function getVolume() : ?float
    {
        return $this->volume;
    }

    public function setVolume(float $volume = null) : void
    {
        $this->volume=$volume;
    }
}
