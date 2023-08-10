<?php

namespace Metarisc\Models;

class Notification
{
    private ?string $id              = null;
    private ?string $title           = null;
    private ?string $message         = null;
    private ?object $contexte        = null;
    private ?string $date_creation   = null;
    private ?string $date_de_lecture = null;
    private ?string $utilisateur_id  = null;
    public function getId() : ?string
    {
        return $this->id;
    }

    public function setId(string $id) : void
    {
        $this->id=$id;
    }

    public function getTitle() : ?string
    {
        return $this->title;
    }

    public function setTitle(string $title) : void
    {
        $this->title=$title;
    }

    public function getMessage() : ?string
    {
        return $this->message;
    }

    public function setMessage(string $message) : void
    {
        $this->message=$message;
    }

    public function getContexte() : ?object
    {
        return $this->contexte;
    }

    public function setContexte(object $contexte) : void
    {
        $this->contexte=$contexte;
    }

    public function getDateCreation() : ?string
    {
        return $this->date_creation;
    }

    public function setDateCreation(string $date_creation) : void
    {
        $this->date_creation=$date_creation;
    }

    public function getDateDeLecture() : ?string
    {
        return $this->date_de_lecture;
    }

    public function setDateDeLecture(string $date_de_lecture) : void
    {
        $this->date_de_lecture=$date_de_lecture;
    }

    public function getUtilisateurId() : ?string
    {
        return $this->utilisateur_id;
    }

    public function setUtilisateurId(string $utilisateur_id) : void
    {
        $this->utilisateur_id=$utilisateur_id;
    }
}
