<?php

namespace Metarisc\Model;

class PostEvenementRequest extends ModelAbstract
{
    private ?string $title       = null;
    private ?string $type        = null;
    private ?string $description = null;
    private ?string $date_debut  = null;
    private ?string $date_fin    = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

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

    public function getDateDebut() : ?string
    {
        return $this->date_debut;
    }

    public function setDateDebut(?string $date_debut) : void
    {
        $this->date_debut = $date_debut;
    }

    public function getDateFin() : ?string
    {
        return $this->date_fin;
    }

    public function setDateFin(?string $date_fin) : void
    {
        $this->date_fin = $date_fin;
    }
}
