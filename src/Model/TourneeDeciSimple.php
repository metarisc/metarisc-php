<?php

namespace Metarisc\Model;

class TourneeDeciSimple extends TourneeDeciBase
{
    private ?float $pourcentage                        = null;
    private ?bool $est_terminee                        = null;
    private ?\DateTime $date_de_debut                  = null;
    private ?\DateTime $date_de_fin                    = null;
    private ?\Metarisc\Model\TourneeDeciModele $modele = null;

    public function getPourcentage() : ?float
    {
        return $this->pourcentage;
    }

    public function setPourcentage(float $pourcentage) : void
    {
        $this->pourcentage=$pourcentage;
    }

    public function getEstTerminee() : ?bool
    {
        return $this->est_terminee;
    }

    public function setEstTerminee(bool $est_terminee) : void
    {
        $this->est_terminee=$est_terminee;
    }

    public function getDateDeDebut() : ?\DateTime
    {
        return $this->date_de_debut;
    }

    public function setDateDeDebut(\DateTime $date_de_debut) : void
    {
        $this->date_de_debut=$date_de_debut;
    }

    public function getDateDeFin() : ?\DateTime
    {
        return $this->date_de_fin;
    }

    public function setDateDeFin(\DateTime $date_de_fin) : void
    {
        $this->date_de_fin=$date_de_fin;
    }

    public function getModele() : ?TourneeDeciModele
    {
        return $this->modele;
    }

    public function setModele(TourneeDeciModele $modele) : void
    {
        $this->modele=$modele;
    }
}
