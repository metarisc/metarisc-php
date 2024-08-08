<?php

namespace Metarisc\Model;

/*
 * Modèle de tournée DECI permettant une programmation cyclique.
*/

class TourneeDeciModele extends TourneeDeciBase
{
    private ?int $mois_debut = null;
    private ?int $mois_fin   = null;

    public function getMoisDebut() : ?int
    {
        return $this->mois_debut;
    }

    public function setMoisDebut(int $mois_debut) : void
    {
        $this->mois_debut=$mois_debut;
    }

    public function getMoisFin() : ?int
    {
        return $this->mois_fin;
    }

    public function setMoisFin(int $mois_fin) : void
    {
        $this->mois_fin=$mois_fin;
    }
}
