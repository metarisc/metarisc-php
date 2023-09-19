<?php

namespace Metarisc\Model;

class PostNotificationRequest
{
    private ?string $title          = null;
    private ?string $message        = null;
    private ?array $contexte        = null;
    private ?string $utilisateur_id = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['title'] */
        $object->setTitle($data['title']);

        /** @var string $data['message'] */
        $object->setMessage($data['message']);

        /** @var array $data['contexte'] */
        $object->setContexte($data['contexte']);

        /** @var string $data['utilisateur_id'] */
        $object->setUtilisateurId($data['utilisateur_id']);

        return $object;
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

    public function getUtilisateurId() : ?string
    {
        return $this->utilisateur_id;
    }

    public function setUtilisateurId(string $utilisateur_id = null) : void
    {
        $this->utilisateur_id=$utilisateur_id;
    }
}
