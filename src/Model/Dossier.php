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
    private ?\DateTime $date_de_creation  = null;
    private ?string $createur             = null;
    private ?string $application_utilisee = null;
    private ?string $statut               = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var array<array-key, mixed> $data['type'] */
        $object->setType($data['type']);

        /** @var string $data['description'] */
        $object->setDescription($data['description']);

        /** @var string $data['date_de_creation'] */
        $object->setDateDeCreation($data['date_de_creation']);

        /** @var string $data['createur'] */
        $object->setCreateur($data['createur']);

        /** @var string $data['application_utilisee'] */
        $object->setApplicationUtilisee($data['application_utilisee']);

        /** @var string $data['statut'] */
        $object->setStatut($data['statut']);

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

    public function getType() : ?Type
    {
        return $this->type;
    }

    public function setType(array $type) : void
    {
        $this->type=\Metarisc\Model\Type::unserialize($type);
    }

    public function getDescription() : ?string
    {
        return $this->description;
    }

    public function setDescription(string $description = null) : void
    {
        $this->description=$description;
    }

    public function getDateDeCreation() : ?\DateTime
    {
        return $this->date_de_creation;
    }

    public function setDateDeCreation(?string $date_de_creation) : void
    {
        $this->date_de_creation = (\is_string($date_de_creation)) ? \DateTime::createFromFormat(\DATE_ATOM, $date_de_creation) : null;
    }

    public function getCreateur() : ?string
    {
        return $this->createur;
    }

    public function setCreateur(string $createur = null) : void
    {
        $this->createur=$createur;
    }

    public function getApplicationUtilisee() : ?string
    {
        return $this->application_utilisee;
    }

    public function setApplicationUtilisee(string $application_utilisee = null) : void
    {
        $this->application_utilisee=$application_utilisee;
    }

    public function getStatut() : ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut = null) : void
    {
        $this->statut=$statut;
    }
}
