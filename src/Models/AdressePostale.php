<?php

namespace Metarisc\Models;

class AdressePostale
{
    private ?string $code_postal    = null;
    private ?string $commune        = null;
    private ?string $voie           = null;
    private ?string $code_insee     = null;
    private ?string $arrondissement = null;
    public function getCodePostal() : ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal)
    {
        $this->code_postal=$code_postal;
    }

    public function getCommune() : ?string
    {
        return $this->commune;
    }

    public function setCommune(string $commune)
    {
        $this->commune=$commune;
    }

    public function getVoie() : ?string
    {
        return $this->voie;
    }

    public function setVoie(string $voie)
    {
        $this->voie=$voie;
    }

    public function getCodeInsee() : ?string
    {
        return $this->code_insee;
    }

    public function setCodeInsee(string $code_insee)
    {
        $this->code_insee=$code_insee;
    }

    public function getArrondissement() : ?string
    {
        return $this->arrondissement;
    }

    public function setArrondissement(string $arrondissement)
    {
        $this->arrondissement=$arrondissement;
    }
}
