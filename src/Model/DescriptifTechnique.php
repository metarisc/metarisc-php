<?php

namespace Metarisc\Model;

class DescriptifTechnique
{
    private ?string $libelle                                              = null;
    private ?string $observations_generales                               = null;
    private ?\DateTime $date                                              = null;
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

    public function getLibelle() : ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle) : void
    {
        $this->libelle=$libelle;
    }

    public function getObservationsGenerales() : ?string
    {
        return $this->observations_generales;
    }

    public function setObservationsGenerales(string $observations_generales) : void
    {
        $this->observations_generales=$observations_generales;
    }

    public function getDate() : ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date) : void
    {
        $this->date=$date;
    }

    public function getAnomalies() : ?array
    {
        return $this->anomalies;
    }

    public function setAnomalies(array $anomalies) : void
    {
        $this->anomalies=$anomalies;
    }

    public function getEstReglementaire() : ?bool
    {
        return $this->est_reglementaire;
    }

    public function setEstReglementaire(bool $est_reglementaire) : void
    {
        $this->est_reglementaire=$est_reglementaire;
    }

    public function getEstReforme() : ?bool
    {
        return $this->est_reforme;
    }

    public function setEstReforme(bool $est_reforme) : void
    {
        $this->est_reforme=$est_reforme;
    }

    public function getDomanialite() : ?string
    {
        return $this->domanialite;
    }

    public function setDomanialite(string $domanialite) : void
    {
        $this->domanialite=$domanialite;
    }

    public function getEstConforme() : ?bool
    {
        return $this->est_conforme;
    }

    public function setEstConforme(bool $est_conforme) : void
    {
        $this->est_conforme=$est_conforme;
    }

    public function getPerformanceTheorique() : ?int
    {
        return $this->performance_theorique;
    }

    public function setPerformanceTheorique(int $performance_theorique) : void
    {
        $this->performance_theorique=$performance_theorique;
    }

    public function getPerformanceReelle() : ?int
    {
        return $this->performance_reelle;
    }

    public function setPerformanceReelle(int $performance_reelle) : void
    {
        $this->performance_reelle=$performance_reelle;
    }

    public function getNumeroSerieAppareil() : ?string
    {
        return $this->numero_serie_appareil;
    }

    public function setNumeroSerieAppareil(string $numero_serie_appareil) : void
    {
        $this->numero_serie_appareil=$numero_serie_appareil;
    }

    public function getSurpression() : ?float
    {
        return $this->surpression;
    }

    public function setSurpression(float $surpression) : void
    {
        $this->surpression=$surpression;
    }

    public function getNature() : ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature) : void
    {
        $this->nature=$nature;
    }

    public function getCaracteristiquesParticulieres() : ?array
    {
        return $this->caracteristiques_particulieres;
    }

    public function setCaracteristiquesParticulieres(array $caracteristiques_particulieres) : void
    {
        $this->caracteristiques_particulieres=$caracteristiques_particulieres;
    }

    public function getPesees() : ?DescriptifTechniquePIBIAllOfPesees
    {
        return $this->pesees;
    }

    public function setPesees(DescriptifTechniquePIBIAllOfPesees $pesees) : void
    {
        $this->pesees=$pesees;
    }

    public function getEssaisEnginUtilise() : ?string
    {
        return $this->essais_engin_utilise;
    }

    public function setEssaisEnginUtilise(string $essais_engin_utilise) : void
    {
        $this->essais_engin_utilise=$essais_engin_utilise;
    }

    public function getEquipements() : ?array
    {
        return $this->equipements;
    }

    public function setEquipements(array $equipements) : void
    {
        $this->equipements=$equipements;
    }

    public function getVolumes() : ?DescriptifTechniquePENAAllOfVolumes
    {
        return $this->volumes;
    }

    public function setVolumes(DescriptifTechniquePENAAllOfVolumes $volumes) : void
    {
        $this->volumes=$volumes;
    }

    public function getRealimentation() : ?array
    {
        return $this->realimentation;
    }

    public function setRealimentation(array $realimentation) : void
    {
        $this->realimentation=$realimentation;
    }
}
