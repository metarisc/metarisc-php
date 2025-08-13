<?php

namespace Metarisc\Model;

/*
 * Les établissements recevant du public (ERP) sont des bâtiments, des locaux ou des enceintes dans lesquels sont admises des personnes extérieures.
*/

class ObjetERP extends ModelAbstract
{
    private ?\Metarisc\Model\ObjetERPImplantation $implantation                    = null;
    private ?\Metarisc\Model\ObjetERPDescriptifTechnique $descriptif_technique     = null;
    private ?string $avis_exploitation                                             = null;
    private ?\DateTime $date_pc_initial                                            = null;
    private ?\DateTime $date_ouverture                                             = null;
    private ?\DateTime $date_derniere_visite                                       = null;
    private ?string $notes_internes                                                = null;
    private ?array $sites_geographiques_id                                         = null;
    private ?string $commission_de_securite_id                                     = null;
    private ?array $titulaires_id                                                  = null;
    private ?\Metarisc\Model\ObjetERPEtablissementRattache $etablissement_rattache = null;
    private ?array $textes_applicables                                             = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

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

        /** @var string[] $data['sites_geographiques_id'] */
        $object->setSitesGeographiquesId($data['sites_geographiques_id']);

        /** @var string $data['commission_de_securite_id'] */
        $object->setCommissionDeSecuriteId($data['commission_de_securite_id']);

        /** @var string[] $data['titulaires_id'] */
        $object->setTitulairesId($data['titulaires_id']);

        /** @var array<array-key, mixed> $data['etablissement_rattache'] */
        $object->setEtablissementRattache($data['etablissement_rattache']);

        /** @var \Metarisc\Model\ObjetTexteApplicable[] $data['textes_applicables'] */
        $object->setTextesApplicables($data['textes_applicables']);

        return $object;
    }

    public function getImplantation() : ?ObjetERPImplantation
    {
        return $this->implantation;
    }

    public function setImplantation(array $implantation) : void
    {
        $this->implantation=ObjetERPImplantation::unserialize($implantation);
    }

    public function getDescriptifTechnique() : ?ObjetERPDescriptifTechnique
    {
        return $this->descriptif_technique;
    }

    public function setDescriptifTechnique(array $descriptif_technique) : void
    {
        $this->descriptif_technique=ObjetERPDescriptifTechnique::unserialize($descriptif_technique);
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

    public function getSitesGeographiquesId() : ?array
    {
        return $this->sites_geographiques_id;
    }

    public function setSitesGeographiquesId(array $sites_geographiques_id = null) : void
    {
        $this->sites_geographiques_id=$sites_geographiques_id;
    }

    public function getCommissionDeSecuriteId() : ?string
    {
        return $this->commission_de_securite_id;
    }

    public function setCommissionDeSecuriteId(string $commission_de_securite_id = null) : void
    {
        $this->commission_de_securite_id=$commission_de_securite_id;
    }

    public function getTitulairesId() : ?array
    {
        return $this->titulaires_id;
    }

    public function setTitulairesId(array $titulaires_id = null) : void
    {
        $this->titulaires_id=$titulaires_id;
    }

    public function getEtablissementRattache() : ?ObjetERPEtablissementRattache
    {
        return $this->etablissement_rattache;
    }

    public function setEtablissementRattache(array $etablissement_rattache) : void
    {
        $this->etablissement_rattache=ObjetERPEtablissementRattache::unserialize($etablissement_rattache);
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
