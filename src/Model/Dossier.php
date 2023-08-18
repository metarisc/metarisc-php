<?php

namespace Metarisc\Model;

/*
 * Un dossier représente la vie d'un POI
*/

class Dossier
{
    private ?string $id                   = null;
    private ?\Metarisc\Model\Type $type   = null;
    private ?string $description          = null;
    private ?string $programmation        = null;
    private ?\DateTime $date_de_creation  = null;
    private ?string $createur             = null;
    private ?string $application_utilisee = null;
    private ?string $statut               = null;

    public function getId() : ?string
    {
        return $this->id;
    }

    public function setId(string $id) : void
    {
        $this->id=$id;
    }

    public function getType() : ?Type
    {
        return $this->type;
    }

    public function setType(Type $type) : void
    {
        $this->type=$type;
    }

    public function getDescription() : ?string
    {
        return $this->description;
    }

    public function setDescription(string $description) : void
    {
        $this->description=$description;
    }

    public function getProgrammation() : ?string
    {
        return $this->programmation;
    }

    public function setProgrammation(string $programmation) : void
    {
        $this->programmation=$programmation;
    }

    public function getDateDeCreation() : ?\DateTime
    {
        return $this->date_de_creation;
    }

    public function setDateDeCreation(\DateTime $date_de_creation) : void
    {
        $this->date_de_creation=$date_de_creation;
    }

    public function getCreateur() : ?string
    {
        return $this->createur;
    }

    public function setCreateur(string $createur) : void
    {
        $this->createur=$createur;
    }

    public function getApplicationUtilisee() : ?string
    {
        return $this->application_utilisee;
    }

    public function setApplicationUtilisee(string $application_utilisee) : void
    {
        $this->application_utilisee=$application_utilisee;
    }

    public function getStatut() : ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut) : void
    {
        $this->statut=$statut;
    }
}
