<?php

namespace Metarisc\Model;

/*
 * Une notification est un objet créé pour avertir ou informer un utilisateur pour un évévemenent spécifique.
*/

class Notification extends ModelAbstract
{
    private ?string $id                               = null;
    private ?string $title                            = null;
    private ?string $message                          = null;
    private ?array $contexte                          = null;
    private ?string $date_creation                    = null;
    private ?string $date_de_lecture                  = null;
    private ?string $utilisateur_id                   = null;
    private ?\Metarisc\Model\Utilisateur $utilisateur = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['title'] */
        $object->setTitle($data['title']);

        /** @var string $data['message'] */
        $object->setMessage($data['message']);

        /** @var array $data['contexte'] */
        $object->setContexte($data['contexte']);

        /** @var string $data['date_creation'] */
        $object->setDateCreation($data['date_creation']);

        /** @var string $data['date_de_lecture'] */
        $object->setDateDeLecture($data['date_de_lecture']);

        /** @var string $data['utilisateur_id'] */
        $object->setUtilisateurId($data['utilisateur_id']);

        /** @var array<array-key, mixed> $data['utilisateur'] */
        $object->setUtilisateur($data['utilisateur']);

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

    public function getTitle() : ?string
    {
        return $this->title;
    }

    public function setTitle(string $title = null) : void
    {
        $this->title=$title;
    }

    public function getMessage() : ?string
    {
        return $this->message;
    }

    public function setMessage(string $message = null) : void
    {
        $this->message=$message;
    }

    public function getContexte() : ?array
    {
        return $this->contexte;
    }

    public function setContexte(array $contexte = null) : void
    {
        $this->contexte=$contexte;
    }

    public function getDateCreation() : ?string
    {
        return $this->date_creation;
    }

    public function setDateCreation(?string $date_creation) : void
    {
        $this->date_creation = $date_creation;
    }

    public function getDateDeLecture() : ?string
    {
        return $this->date_de_lecture;
    }

    public function setDateDeLecture(?string $date_de_lecture) : void
    {
        $this->date_de_lecture = $date_de_lecture;
    }

    public function getUtilisateurId() : ?string
    {
        return $this->utilisateur_id;
    }

    public function setUtilisateurId(string $utilisateur_id = null) : void
    {
        $this->utilisateur_id=$utilisateur_id;
    }

    public function getUtilisateur() : ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(array $utilisateur) : void
    {
        $this->utilisateur=Utilisateur::unserialize($utilisateur);
    }
}
