<?php

namespace Metarisc\Model;

class TourneeDeciModele extends TourneeDeciBase
{
    private ?string $mois_debut = null;
    private ?string $mois_fin   = null;

    public function getMoisDebut() : ?string
    {
        return $this->mois_debut;
    }

    public function setMoisDebut(string $mois_debut) : void
    {
        $this->mois_debut=$mois_debut;
    }

    public function getMoisFin() : ?string
    {
        return $this->mois_fin;
    }

    public function setMoisFin(string $mois_fin) : void
    {
        $this->mois_fin=$mois_fin;
    }
}
