<?php

namespace Metarisc\Model;

/*
 * Les établissements recevant du public (ERP) sont des bâtiments, des locaux ou des enceintes dans lesquels sont admises des personnes extérieures.
*/

class ERP extends ModelAbstract
{
    private ?string $id                                                   = null;
    private ?string $date_de_realisation                                  = null;
    private ?string $date_de_derniere_mise_a_jour                         = null;
    private ?\Metarisc\Model\AdressePostale $implantation                 = null;
    private ?\Metarisc\Model\DescriptifTechniqueERP $descriptif_technique = null;
    private ?string $avis_exploitation                                    = null;
    private ?\DateTime $date_pc_initial                                   = null;
    private ?\DateTime $date_ouverture                                    = null;
    private ?\DateTime $date_derniere_visite                              = null;
    private ?string $notes_internes                                       = null;
    private ?array $references_exterieures                                = null;
    private ?string $a_visiter_en                                         = null;
    private ?array $sites_geographiques                                   = null;
    private ?\Metarisc\Model\Commission $commission_de_securite           = null;
    private ?array $titulaires                                            = null;
    private ?\Metarisc\Model\ERPLie $etablissement_rattache               = null;
    private ?array $textes_applicables                                    = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['date_de_realisation'] */
        $object->setDateDeRealisation($data['date_de_realisation']);

        /** @var string $data['date_de_derniere_mise_a_jour'] */
        $object->setDateDeDerniereMiseAJour($data['date_de_derniere_mise_a_jour']);

        /** @var array<array-key, mixed> $data['implantation'] */
        $object->setImplantation($data['implantation']);

        /** @var array<array-key, mixed> $data['descriptif_technique'] */
        $object->setDescriptifTechnique($data['descriptif_technique']);

        /** @var string $data['avis_exploitation'] */
        $object->setAvisExploitation($data['avis_exploitation']);

        /** @var \DateTime $data['date_pc_initial'] */
        $object->setDatePcInitial($data['date_pc_initial']);

        /** @var \DateTime $data['date_ouverture'] */
        $object->setDateOuverture($data['date_ouverture']);

        /** @var \DateTime $data['date_derniere_visite'] */
        $object->setDateDerniereVisite($data['date_derniere_visite']);

        /** @var string $data['notes_internes'] */
        $object->setNotesInternes($data['notes_internes']);

        /** @var \Metarisc\Model\ReferenceExterieure[] $data['references_exterieures'] */
        $object->setReferencesExterieures($data['references_exterieures']);

        /** @var string $data['a_visiter_en'] */
        $object->setAVisiterEn($data['a_visiter_en']);

        /** @var \Metarisc\Model\SiteGeographique[] $data['sites_geographiques'] */
        $object->setSitesGeographiques($data['sites_geographiques']);

        /** @var array<array-key, mixed> $data['commission_de_securite'] */
        $object->setCommissionDeSecurite($data['commission_de_securite']);

        /** @var \Metarisc\Model\Utilisateur[] $data['titulaires'] */
        $object->setTitulaires($data['titulaires']);

        /** @var array<array-key, mixed> $data['etablissement_rattache'] */
        $object->setEtablissementRattache($data['etablissement_rattache']);

        /** @var \Metarisc\Model\TexteApplicable[] $data['textes_applicables'] */
        $object->setTextesApplicables($data['textes_applicables']);

        return $object;
    }

    public function getId() : ?string
    {
        return $this->id;
    }

    public function setId(string $id = null) : void
    {
        $this->id=$id;
    }

    public function getDateDeRealisation() : ?string
    {
        return $this->date_de_realisation;
    }

    public function setDateDeRealisation(?string $date_de_realisation) : void
    {
        $this->date_de_realisation = $date_de_realisation;
    }

    public function getDateDeDerniereMiseAJour() : ?string
    {
        return $this->date_de_derniere_mise_a_jour;
    }

    public function setDateDeDerniereMiseAJour(?string $date_de_derniere_mise_a_jour) : void
    {
        $this->date_de_derniere_mise_a_jour = $date_de_derniere_mise_a_jour;
    }

    public function getImplantation() : ?AdressePostale
    {
        return $this->implantation;
    }

    public function setImplantation(array $implantation) : void
    {
        $this->implantation=AdressePostale::unserialize($implantation);
    }

    public function getDescriptifTechnique() : ?DescriptifTechniqueERP
    {
        return $this->descriptif_technique;
    }

    public function setDescriptifTechnique(array $descriptif_technique) : void
    {
        $this->descriptif_technique=DescriptifTechniqueERP::unserialize($descriptif_technique);
    }

    public function getAvisExploitation() : ?string
    {
        return $this->avis_exploitation;
    }

    public function setAvisExploitation(string $avis_exploitation = null) : void
    {
        $this->avis_exploitation=$avis_exploitation;
    }

    public function getDatePcInitial() : ?\DateTime
    {
        return $this->date_pc_initial;
    }

    public function setDatePcInitial(\DateTime $date_pc_initial = null) : void
    {
        $this->date_pc_initial=$date_pc_initial;
    }

    public function getDateOuverture() : ?\DateTime
    {
        return $this->date_ouverture;
    }

    public function setDateOuverture(\DateTime $date_ouverture = null) : void
    {
        $this->date_ouverture=$date_ouverture;
    }

    public function getDateDerniereVisite() : ?\DateTime
    {
        return $this->date_derniere_visite;
    }

    public function setDateDerniereVisite(\DateTime $date_derniere_visite = null) : void
    {
        $this->date_derniere_visite=$date_derniere_visite;
    }

    public function getNotesInternes() : ?string
    {
        return $this->notes_internes;
    }

    public function setNotesInternes(string $notes_internes = null) : void
    {
        $this->notes_internes=$notes_internes;
    }

    public function getReferencesExterieures() : ?array
    {
        return $this->references_exterieures;
    }

    public function setReferencesExterieures(array $references_exterieures = null) : void
    {
        $this->references_exterieures=$references_exterieures;
    }

    public function getAVisiterEn() : ?string
    {
        return $this->a_visiter_en;
    }

    public function setAVisiterEn(string $a_visiter_en = null) : void
    {
        $this->a_visiter_en=$a_visiter_en;
    }

    public function getSitesGeographiques() : ?array
    {
        return $this->sites_geographiques;
    }

    public function setSitesGeographiques(array $sites_geographiques = null) : void
    {
        $this->sites_geographiques=$sites_geographiques;
    }

    public function getCommissionDeSecurite() : ?Commission
    {
        return $this->commission_de_securite;
    }

    public function setCommissionDeSecurite(array $commission_de_securite) : void
    {
        $this->commission_de_securite=Commission::unserialize($commission_de_securite);
    }

    public function getTitulaires() : ?array
    {
        return $this->titulaires;
    }

    public function setTitulaires(array $titulaires = null) : void
    {
        $this->titulaires=$titulaires;
    }

    public function getEtablissementRattache() : ?ERPLie
    {
        return $this->etablissement_rattache;
    }

    public function setEtablissementRattache(array $etablissement_rattache) : void
    {
        $this->etablissement_rattache=ERPLie::unserialize($etablissement_rattache);
    }

    public function getTextesApplicables() : ?array
    {
        return $this->textes_applicables;
    }

    public function setTextesApplicables(array $textes_applicables = null) : void
    {
        $this->textes_applicables=$textes_applicables;
    }
}
