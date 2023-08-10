<?php

namespace Metarisc\Models;

class DescriptifTechniqueBase
{
    private ?string $libelle                = null;
    private ?string $observations_generales = null;
    private ?\DateTime $date                = null;
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
}
