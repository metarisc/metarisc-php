<?php

namespace Metarisc\Model;

class DescriptifTechniqueDECIBase extends DescriptifTechniqueBase
{
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
}
