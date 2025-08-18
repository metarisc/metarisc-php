<?php

namespace Metarisc\Model;

/*
 * Descriptif technique d'un PENA - Point d'Eau Naturel ou Artificiel.
*/

class DescriptifTechniquePENA extends DescriptifTechniqueDECIBase
{
    private ?string $nature    = null;
    private ?float $volume     = null;
    private ?bool $est_citerne = null;

    public function getNature() : ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature) : void
    {
        $this->nature=$nature;
    }

    public function getVolume() : ?float
    {
        return $this->volume;
    }

    public function setVolume(float $volume) : void
    {
        $this->volume=$volume;
    }

    public function getEstCiterne() : ?bool
    {
        return $this->est_citerne;
    }

    public function setEstCiterne(bool $est_citerne) : void
    {
        $this->est_citerne=$est_citerne;
    }
}
