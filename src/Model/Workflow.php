<?php

namespace Metarisc\Model;

class Workflow
{
    private ?string $id                      = null;
    private ?string $titre                   = null;
    private ?string $date_de_creation        = null;
    private ?string $date_de_fin             = null;
    private ?bool $workflow_automatise       = null;
    private ?string $etat                    = null;
    private ?string $groupe_de_travail       = null;
    private ?string $observations            = null;
    private ?bool $est_complet               = null;
    private ?string $liste_poi               = null;
    private ?string $documents               = null;
    private ?string $type                    = null;
    private ?string $dossier_lie             = null;
    private ?string $pei_lie                 = null;
    private ?array $anomalies_levees         = null;
    private ?string $programmation_evenement = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['titre'] */
        $object->setTitre($data['titre']);

        /** @var string $data['date_de_creation'] */
        $object->setDateDeCreation($data['date_de_creation']);

        /** @var string $data['date_de_fin'] */
        $object->setDateDeFin($data['date_de_fin']);

        /** @var bool $data['workflow_automatise'] */
        $object->setWorkflowAutomatise($data['workflow_automatise']);

        /** @var string $data['etat'] */
        $object->setEtat($data['etat']);

        /** @var string $data['groupe_de_travail'] */
        $object->setGroupeDeTravail($data['groupe_de_travail']);

        /** @var string $data['observations'] */
        $object->setObservations($data['observations']);

        /** @var bool $data['est_complet'] */
        $object->setEstComplet($data['est_complet']);

        /** @var string $data['liste_poi'] */
        $object->setListePoi($data['liste_poi']);

        /** @var string $data['documents'] */
        $object->setDocuments($data['documents']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var string $data['dossier_lie'] */
        $object->setDossierLie($data['dossier_lie']);

        /** @var string $data['pei_lie'] */
        $object->setPeiLie($data['pei_lie']);

        /** @var string[] $data['anomalies_levees'] */
        $object->setAnomaliesLevees($data['anomalies_levees']);

        /** @var string $data['programmation_evenement'] */
        $object->setProgrammationEvenement($data['programmation_evenement']);

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

    public function getTitre() : ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre = null) : void
    {
        $this->titre=$titre;
    }

    public function getDateDeCreation() : ?string
    {
        return $this->date_de_creation;
    }

    public function setDateDeCreation(?string $date_de_creation) : void
    {
        $this->date_de_creation = $date_de_creation;
    }

    public function getDateDeFin() : ?string
    {
        return $this->date_de_fin;
    }

    public function setDateDeFin(?string $date_de_fin) : void
    {
        $this->date_de_fin = $date_de_fin;
    }

    public function getWorkflowAutomatise() : ?bool
    {
        return $this->workflow_automatise;
    }

    public function setWorkflowAutomatise(bool $workflow_automatise = null) : void
    {
        $this->workflow_automatise=$workflow_automatise;
    }

    public function getEtat() : ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat = null) : void
    {
        $this->etat=$etat;
    }

    public function getGroupeDeTravail() : ?string
    {
        return $this->groupe_de_travail;
    }

    public function setGroupeDeTravail(string $groupe_de_travail = null) : void
    {
        $this->groupe_de_travail=$groupe_de_travail;
    }

    public function getObservations() : ?string
    {
        return $this->observations;
    }

    public function setObservations(string $observations = null) : void
    {
        $this->observations=$observations;
    }

    public function getEstComplet() : ?bool
    {
        return $this->est_complet;
    }

    public function setEstComplet(bool $est_complet = null) : void
    {
        $this->est_complet=$est_complet;
    }

    public function getListePoi() : ?string
    {
        return $this->liste_poi;
    }

    public function setListePoi(string $liste_poi = null) : void
    {
        $this->liste_poi=$liste_poi;
    }

    public function getDocuments() : ?string
    {
        return $this->documents;
    }

    public function setDocuments(string $documents = null) : void
    {
        $this->documents=$documents;
    }

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
    }

    public function getDossierLie() : ?string
    {
        return $this->dossier_lie;
    }

    public function setDossierLie(string $dossier_lie = null) : void
    {
        $this->dossier_lie=$dossier_lie;
    }

    public function getPeiLie() : ?string
    {
        return $this->pei_lie;
    }

    public function setPeiLie(string $pei_lie = null) : void
    {
        $this->pei_lie=$pei_lie;
    }

    public function getAnomaliesLevees() : ?array
    {
        return $this->anomalies_levees;
    }

    public function setAnomaliesLevees(array $anomalies_levees = null) : void
    {
        $this->anomalies_levees=$anomalies_levees;
    }

    public function getProgrammationEvenement() : ?string
    {
        return $this->programmation_evenement;
    }

    public function setProgrammationEvenement(string $programmation_evenement = null) : void
    {
        $this->programmation_evenement=$programmation_evenement;
    }
}
