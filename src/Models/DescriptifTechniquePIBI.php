<?php

namespace Metarisc\Models;

class DescriptifTechniquePIBI extends DescriptifTechniqueDECIBase
{
    private ?string $numero_serie_appareil        = null;
    private ?float $surpression                   = null;
    private ?string $nature                       = null;
    private ?array $caracteristiques_particulieres=null;

    private ?\Metarisc\Models\DescriptifTechniquePIBIAllOfPesees $pesees = null;
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
}
