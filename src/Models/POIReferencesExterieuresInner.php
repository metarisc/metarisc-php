<?php

namespace Metarisc\Models;

class POIReferencesExterieuresInner
{
    private ?string $titre  = null;
    private ?string $valeur = null;
    public function getTitre() : ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre) : void
    {
        $this->titre=$titre;
    }

    public function getValeur() : ?string
    {
        return $this->valeur;
    }

    public function setValeur(string $valeur) : void
    {
        $this->valeur=$valeur;
    }
}
