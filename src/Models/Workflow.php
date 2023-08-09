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
    public function getId() : ?string
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id=$id;
    }

    public function getTitre() : ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre)
    {
        $this->titre=$titre;
    }

    public function getDateDeCreation() : ?\DateTime
    {
        return $this->date_de_creation;
    }

    public function setDateDeCreation(\DateTime $date_de_creation)
    {
        $this->date_de_creation=$date_de_creation;
    }

    public function getDateDeFin() : ?\DateTime
    {
        return $this->date_de_fin;
    }

    public function setDateDeFin(\DateTime $date_de_fin)
    {
        $this->date_de_fin=$date_de_fin;
    }

    public function getWorkflowAutomatise() : ?bool
    {
        return $this->workflow_automatise;
    }

    public function setWorkflowAutomatise(bool $workflow_automatise)
    {
        $this->workflow_automatise=$workflow_automatise;
    }

    public function getEtat() : ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat)
    {
        $this->etat=$etat;
    }

    public function getGroupeDeTravail() : ?string
    {
        return $this->groupe_de_travail;
    }

    public function setGroupeDeTravail(string $groupe_de_travail)
    {
        $this->groupe_de_travail=$groupe_de_travail;
    }

    public function getObservations() : ?string
    {
        return $this->observations;
    }

    public function setObservations(string $observations)
    {
        $this->observations=$observations;
    }

    public function getEstComplet() : ?bool
    {
        return $this->est_complet;
    }

    public function setEstComplet(bool $est_complet)
    {
        $this->est_complet=$est_complet;
    }

    public function getListePoi() : ?string
    {
        return $this->liste_poi;
    }

    public function setListePoi(string $liste_poi)
    {
        $this->liste_poi=$liste_poi;
    }

    public function getDocuments() : ?string
    {
        return $this->documents;
    }

    public function setDocuments(string $documents)
    {
        $this->documents=$documents;
    }

    public function getDossierLie() : ?string
    {
        return $this->dossier_lie;
    }

    public function setDossierLie(string $dossier_lie)
    {
        $this->dossier_lie=$dossier_lie;
    }

    public function getPeiLie() : ?string
    {
        return $this->pei_lie;
    }

    public function setPeiLie(string $pei_lie)
    {
        $this->pei_lie=$pei_lie;
    }

    public function getAnomaliesLevees() : array
    {
        return $this->anomalies_levees;
    }

    public function setAnomaliesLevees(array $anomalies_levees)
    {
        $this->anomalies_levees=$anomalies_levees;
    }
}
