<?php

namespace Metarisc\Model;

class Evenement
{
    private ?string $id            = null;
    private ?string $title         = null;
    private ?string $type          = null;
    private ?string $description   = null;
    private ?\DateTime $date_debut = null;
    private ?\DateTime $date_fin   = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['title'] */
        $object->setTitle($data['title']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var string $data['description'] */
        $object->setDescription($data['description']);

        /** @var string $data['date_debut'] */
        $object->setDateDebut($data['date_debut']);

        /** @var string $data['date_fin'] */
        $object->setDateFin($data['date_fin']);

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

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
    }

    public function getDescription() : ?string
    {
        return $this->description;
    }

    public function setDescription(string $description = null) : void
    {
        $this->description=$description;
    }

    public function getDateDebut() : ?\DateTime
    {
        return $this->date_debut;
    }

    public function setDateDebut(?string $date_debut) : void
    {
        $this->date_debut = (\is_string($date_debut)) ? \DateTime::createFromFormat(\DATE_ATOM, $date_debut) : null;
    }

    public function getDateFin() : ?\DateTime
    {
        return $this->date_fin;
    }

    public function setDateFin(?string $date_fin) : void
    {
        $this->date_fin = (\is_string($date_fin)) ? \DateTime::createFromFormat(\DATE_ATOM, $date_fin) : null;
    }
}
