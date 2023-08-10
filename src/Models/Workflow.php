<?php

namespace Metarisc\Models;

class Workflow
{
    private ?string $id                  = null;
    private ?string $titre               = null;
    private ?\DateTime $date_de_creation = null;
    private ?\DateTime $date_de_fin      = null;
    private ?bool $workflow_automatise   = null;
    private ?string $etat                = null;
    private ?string $groupe_de_travail   = null;
    private ?string $observations        = null;
    private ?bool $est_complet           = null;
    private ?string $liste_poi           = null;
    private ?string $documents           = null;
    private ?string $dossier_lie         = null;
    private ?string $pei_lie             = null;
    private ?array $anomalies_levees     =null;
    public function getId() : ?string
    {
        return $this->id;
    }

    public function setId(string $id) : void
    {
        $this->id=$id;
    }

    public function getTitre() : ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre) : void
    {
        $this->titre=$titre;
    }

    public function getDateDeCreation() : ?\DateTime
    {
        return $this->date_de_creation;
    }

    public function setDateDeCreation(\DateTime $date_de_creation) : void
    {
        $this->date_de_creation=$date_de_creation;
    }

    public function getDateDeFin() : ?\DateTime
    {
        return $this->date_de_fin;
    }

    public function setDateDeFin(\DateTime $date_de_fin) : void
    {
        $this->date_de_fin=$date_de_fin;
    }

    public function getWorkflowAutomatise() : ?bool
    {
        return $this->workflow_automatise;
    }

    public function setWorkflowAutomatise(bool $workflow_automatise) : void
    {
        $this->workflow_automatise=$workflow_automatise;
    }

    public function getEtat() : ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat) : void
    {
        $this->etat=$etat;
    }

    public function getGroupeDeTravail() : ?string
    {
        return $this->groupe_de_travail;
    }

    public function setGroupeDeTravail(string $groupe_de_travail) : void
    {
        $this->groupe_de_travail=$groupe_de_travail;
    }

    public function getObservations() : ?string
    {
        return $this->observations;
    }

    public function setObservations(string $observations) : void
    {
        $this->observations=$observations;
    }

    public function getEstComplet() : ?bool
    {
        return $this->est_complet;
    }

    public function setEstComplet(bool $est_complet) : void
    {
        $this->est_complet=$est_complet;
    }

    public function getListePoi() : ?string
    {
        return $this->liste_poi;
    }

    public function setListePoi(string $liste_poi) : void
    {
        $this->liste_poi=$liste_poi;
    }

    public function getDocuments() : ?string
    {
        return $this->documents;
    }

    public function setDocuments(string $documents) : void
    {
        $this->documents=$documents;
    }

    public function getDossierLie() : ?string
    {
        return $this->dossier_lie;
    }

    public function setDossierLie(string $dossier_lie) : void
    {
        $this->dossier_lie=$dossier_lie;
    }

    public function getPeiLie() : ?string
    {
        return $this->pei_lie;
    }

    public function setPeiLie(string $pei_lie) : void
    {
        $this->pei_lie=$pei_lie;
    }

    public function getAnomaliesLevees() : ?array
    {
        return $this->anomalies_levees;
    }

    public function setAnomaliesLevees(array $anomalies_levees) : void
    {
        $this->anomalies_levees=$anomalies_levees;
    }
}
