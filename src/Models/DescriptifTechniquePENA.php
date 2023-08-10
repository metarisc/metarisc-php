<?php

namespace Metarisc\Models;

class DescriptifTechniquePENA extends DescriptifTechniqueDECIBase
{
    private ?string $essais_engin_utilise = null;
    private ?array $equipements           =null;

    private ?string $nature                                                = null;
    private ?\Metarisc\Models\DescriptifTechniquePENAAllOfVolumes $volumes = null;
    private ?array $realimentation                                         =null;
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

    public function getNature() : ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature) : void
    {
        $this->nature=$nature;
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
