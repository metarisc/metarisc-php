<?php

namespace Metarisc\Model;

class POI
{
    private ?string $id                                                = null;
    private ?\DateTime $date_de_realisation                            = null;
    private ?\DateTime $date_de_derniere_mise_a_jour                   = null;
    private ?string $statut                                            = null;
    private ?array $references_exterieures                             = null;
    private ?\Metarisc\Model\DescriptifTechnique $descriptif_technique = null;
    private ?string $geometrie                                         = null;
    private ?\Metarisc\Model\AdressePostale $adresse_postale           = null;

    public function getId() : ?string
    {
        return $this->id;
    }

    public function setId(string $id) : void
    {
        $this->id=$id;
    }

    public function getDateDeRealisation() : ?\DateTime
    {
        return $this->date_de_realisation;
    }

    public function setDateDeRealisation(\DateTime $date_de_realisation) : void
    {
        $this->date_de_realisation=$date_de_realisation;
    }

    public function getDateDeDerniereMiseAJour() : ?\DateTime
    {
        return $this->date_de_derniere_mise_a_jour;
    }

    public function setDateDeDerniereMiseAJour(\DateTime $date_de_derniere_mise_a_jour) : void
    {
        $this->date_de_derniere_mise_a_jour=$date_de_derniere_mise_a_jour;
    }

    public function getStatut() : ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut) : void
    {
        $this->statut=$statut;
    }

    public function getReferencesExterieures() : ?array
    {
        return $this->references_exterieures;
    }

    public function setReferencesExterieures(array $references_exterieures) : void
    {
        $this->references_exterieures=$references_exterieures;
    }

    public function getDescriptifTechnique() : ?DescriptifTechnique
    {
        return $this->descriptif_technique;
    }

    public function setDescriptifTechnique(DescriptifTechnique $descriptif_technique) : void
    {
        $this->descriptif_technique=$descriptif_technique;
    }

    public function getGeometrie() : ?string
    {
        return $this->geometrie;
    }

    public function setGeometrie(string $geometrie) : void
    {
        $this->geometrie=$geometrie;
    }

    public function getAdressePostale() : ?AdressePostale
    {
        return $this->adresse_postale;
    }

    public function setAdressePostale(AdressePostale $adresse_postale) : void
    {
        $this->adresse_postale=$adresse_postale;
    }
}
