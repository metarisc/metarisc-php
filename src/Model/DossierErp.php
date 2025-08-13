<?php

namespace Metarisc\Model;

/*
 * Dossier d'un ERP.
*/

class DossierErp extends DossierBase
{
    private ?string $type                      = null;
    private ?\Metarisc\Model\ERP $erp          = null;
    private ?string $numero_urbanisme          = null;
    private ?\DateTime $numero_urbanisme_date  = null;
    private ?string $demandeur                 = null;
    private ?string $service_instructeur       = null;
    private ?string $descriptif_travaux        = null;
    private ?\DateTime $date_limite_traitement = null;
    private ?bool $dossier_complet             = null;

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type) : void
    {
        $this->type=$type;
    }

    public function getErp() : ?ERP
    {
        return $this->erp;
    }

    public function setErp(ERP $erp) : void
    {
        $this->erp=$erp;
    }

    public function getNumeroUrbanisme() : ?string
    {
        return $this->numero_urbanisme;
    }

    public function setNumeroUrbanisme(string $numero_urbanisme) : void
    {
        $this->numero_urbanisme=$numero_urbanisme;
    }

    public function getNumeroUrbanismeDate() : ?\DateTime
    {
        return $this->numero_urbanisme_date;
    }

    public function setNumeroUrbanismeDate(\DateTime $numero_urbanisme_date) : void
    {
        $this->numero_urbanisme_date=$numero_urbanisme_date;
    }

    public function getDemandeur() : ?string
    {
        return $this->demandeur;
    }

    public function setDemandeur(string $demandeur) : void
    {
        $this->demandeur=$demandeur;
    }

    public function getServiceInstructeur() : ?string
    {
        return $this->service_instructeur;
    }

    public function setServiceInstructeur(string $service_instructeur) : void
    {
        $this->service_instructeur=$service_instructeur;
    }

    public function getDescriptifTravaux() : ?string
    {
        return $this->descriptif_travaux;
    }

    public function setDescriptifTravaux(string $descriptif_travaux) : void
    {
        $this->descriptif_travaux=$descriptif_travaux;
    }

    public function getDateLimiteTraitement() : ?\DateTime
    {
        return $this->date_limite_traitement;
    }

    public function setDateLimiteTraitement(\DateTime $date_limite_traitement) : void
    {
        $this->date_limite_traitement=$date_limite_traitement;
    }

    public function getDossierComplet() : ?bool
    {
        return $this->dossier_complet;
    }

    public function setDossierComplet(bool $dossier_complet) : void
    {
        $this->dossier_complet=$dossier_complet;
    }
}
