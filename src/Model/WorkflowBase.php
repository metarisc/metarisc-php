<?php

namespace Metarisc\Model;

class WorkflowBase extends ModelAbstract
{
    private ?string $id                = null;
    private ?string $titre             = null;
    private ?string $date_de_creation  = null;
    private ?string $date_de_debut     = null;
    private ?string $date_de_fin       = null;
    private ?bool $workflow_automatise = null;
    private ?bool $termine             = null;
    private ?string $etat              = null;
    private ?string $observations      = null;
    private ?string $type              = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['titre'] */
        $object->setTitre($data['titre']);

        /** @var string $data['date_de_creation'] */
        $object->setDateDeCreation($data['date_de_creation']);

        /** @var string $data['date_de_debut'] */
        $object->setDateDeDebut($data['date_de_debut']);

        /** @var string $data['date_de_fin'] */
        $object->setDateDeFin($data['date_de_fin']);

        /** @var bool $data['workflow_automatise'] */
        $object->setWorkflowAutomatise($data['workflow_automatise']);

        /** @var bool $data['termine'] */
        $object->setTermine($data['termine']);

        /** @var string $data['etat'] */
        $object->setEtat($data['etat']);

        /** @var string $data['observations'] */
        $object->setObservations($data['observations']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

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

    public function getDateDeDebut() : ?string
    {
        return $this->date_de_debut;
    }

    public function setDateDeDebut(?string $date_de_debut) : void
    {
        $this->date_de_debut = $date_de_debut;
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

    public function getTermine() : ?bool
    {
        return $this->termine;
    }

    public function setTermine(bool $termine = null) : void
    {
        $this->termine=$termine;
    }

    public function getEtat() : ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat = null) : void
    {
        $this->etat=$etat;
    }

    public function getObservations() : ?string
    {
        return $this->observations;
    }

    public function setObservations(string $observations = null) : void
    {
        $this->observations=$observations;
    }

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
    }
}
