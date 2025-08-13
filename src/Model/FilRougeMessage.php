<?php

namespace Metarisc\Model;

/*
 * Message associé à un fil rouge d'un dossier.
*/

class FilRougeMessage extends ModelAbstract
{
    private ?string $id                          = null;
    private ?string $message                     = null;
    private ?string $date_de_creation            = null;
    private ?\Metarisc\Model\Utilisateur $auteur = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['message'] */
        $object->setMessage($data['message']);

        /** @var string $data['date_de_creation'] */
        $object->setDateDeCreation($data['date_de_creation']);

        /** @var array<array-key, mixed> $data['auteur'] */
        $object->setAuteur($data['auteur']);

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

    public function getMessage() : ?string
    {
        return $this->message;
    }

    public function setMessage(string $message = null) : void
    {
        $this->message=$message;
    }

    public function getDateDeCreation() : ?string
    {
        return $this->date_de_creation;
    }

    public function setDateDeCreation(?string $date_de_creation) : void
    {
        $this->date_de_creation = $date_de_creation;
    }

    public function getAuteur() : ?Utilisateur
    {
        return $this->auteur;
    }

    public function setAuteur(array $auteur) : void
    {
        $this->auteur=Utilisateur::unserialize($auteur);
    }
}
