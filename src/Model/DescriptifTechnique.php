<?php

namespace Metarisc\Model;

class DescriptifTechnique extends ModelAbstract
{
    private ?string $libelle                                              = null;
    private ?string $observations_generales                               = null;
    private ?string $date                                                 = null;
    private ?array $anomalies                                             = null;
    private ?bool $est_reglementaire                                      = null;
    private ?bool $est_reforme                                            = null;
    private ?string $domanialite                                          = null;
    private ?bool $est_conforme                                           = null;
    private ?int $performance_theorique                                   = null;
    private ?int $performance_reelle                                      = null;
    private ?string $numero_serie_appareil                                = null;
    private ?float $surpression                                           = null;
    private ?string $nature                                               = null;
    private ?array $caracteristiques_particulieres                        = null;
    private ?\Metarisc\Model\DescriptifTechniquePIBIAllOfPesees $pesees   = null;
    private ?string $essais_engin_utilise                                 = null;
    private ?array $equipements                                           = null;
    private ?\Metarisc\Model\DescriptifTechniquePENAAllOfVolumes $volumes = null;
    private ?array $realimentation                                        = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['libelle'] */
        $object->setLibelle($data['libelle']);

        /** @var string $data['observations_generales'] */
        $object->setObservationsGenerales($data['observations_generales']);

        /** @var string $data['date'] */
        $object->setDate($data['date']);

        /** @var \Metarisc\Model\AnomalieDECI[] $data['anomalies'] */
        $object->setAnomalies($data['anomalies']);

        /** @var bool $data['est_reglementaire'] */
        $object->setEstReglementaire($data['est_reglementaire']);

        /** @var bool $data['est_reforme'] */
        $object->setEstReforme($data['est_reforme']);

        /** @var string $data['domanialite'] */
        $object->setDomanialite($data['domanialite']);

        /** @var bool $data['est_conforme'] */
        $object->setEstConforme($data['est_conforme']);

        /** @var int $data['performance_theorique'] */
        $object->setPerformanceTheorique($data['performance_theorique']);

        /** @var int $data['performance_reelle'] */
        $object->setPerformanceReelle($data['performance_reelle']);

        /** @var string $data['numero_serie_appareil'] */
        $object->setNumeroSerieAppareil($data['numero_serie_appareil']);

        /** @var float $data['surpression'] */
        $object->setSurpression($data['surpression']);

        /** @var string $data['nature'] */
        $object->setNature($data['nature']);

        /** @var string[] $data['caracteristiques_particulieres'] */
        $object->setCaracteristiquesParticulieres($data['caracteristiques_particulieres']);

        /** @var array<array-key, mixed> $data['pesees'] */
        $object->setPesees($data['pesees']);

        /** @var string $data['essais_engin_utilise'] */
        $object->setEssaisEnginUtilise($data['essais_engin_utilise']);

        /** @var string[] $data['equipements'] */
        $object->setEquipements($data['equipements']);

        /** @var array<array-key, mixed> $data['volumes'] */
        $object->setVolumes($data['volumes']);

        /** @var \Metarisc\Model\DescriptifTechniquePENAAllOfRealimentation[] $data['realimentation'] */
        $object->setRealimentation($data['realimentation']);

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

    public function getEstReforme() : ?bool
    {
        return $this->est_reforme;
    }

    public function setEstReforme(bool $est_reforme = null) : void
    {
        $this->est_reforme=$est_reforme;
    }

    public function getDomanialite() : ?string
    {
        return $this->domanialite;
    }

    public function setDomanialite(string $domanialite = null) : void
    {
        $this->domanialite=$domanialite;
    }

    public function getEstConforme() : ?bool
    {
        return $this->est_conforme;
    }

    public function setEstConforme(bool $est_conforme = null) : void
    {
        $this->est_conforme=$est_conforme;
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

    public function getNumeroSerieAppareil() : ?string
    {
        return $this->numero_serie_appareil;
    }

    public function setNumeroSerieAppareil(string $numero_serie_appareil = null) : void
    {
        $this->numero_serie_appareil=$numero_serie_appareil;
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

    public function getCaracteristiquesParticulieres() : ?array
    {
        return $this->caracteristiques_particulieres;
    }

    public function setCaracteristiquesParticulieres(array $caracteristiques_particulieres = null) : void
    {
        $this->caracteristiques_particulieres=$caracteristiques_particulieres;
    }

    public function getPesees() : ?DescriptifTechniquePIBIAllOfPesees
    {
        return $this->pesees;
    }

    public function setPesees(array $pesees) : void
    {
        $this->pesees=\Metarisc\Model\DescriptifTechniquePIBIAllOfPesees::unserialize($pesees);
    }

    public function getEssaisEnginUtilise() : ?string
    {
        return $this->essais_engin_utilise;
    }

    public function setEssaisEnginUtilise(string $essais_engin_utilise = null) : void
    {
        $this->essais_engin_utilise=$essais_engin_utilise;
    }

    public function getEquipements() : ?array
    {
        return $this->equipements;
    }

    public function setEquipements(array $equipements = null) : void
    {
        $this->equipements=$equipements;
    }

    public function getVolumes() : ?DescriptifTechniquePENAAllOfVolumes
    {
        return $this->volumes;
    }

    public function setVolumes(array $volumes) : void
    {
        $this->volumes=\Metarisc\Model\DescriptifTechniquePENAAllOfVolumes::unserialize($volumes);
    }

    public function getRealimentation() : ?array
    {
        return $this->realimentation;
    }

    public function setRealimentation(array $realimentation = null) : void
    {
        $this->realimentation=$realimentation;
    }
}
