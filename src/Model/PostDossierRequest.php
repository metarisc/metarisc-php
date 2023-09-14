<?php

namespace Metarisc\Model;

class PostDossierRequest
{
    private ?string $titre       = null;
    private ?string $description = null;
    private ?string $workflows   = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['titre'] */
        $object->setTitre($data['titre']);

        /** @var string $data['description'] */
        $object->setDescription($data['description']);

        /** @var string $data['workflows'] */
        $object->setWorkflows($data['workflows']);

        return $object;
    }

    public function getTitre() : ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre = null) : void
    {
        $this->titre=$titre;
    }

    public function getDescription() : ?string
    {
        return $this->description;
    }

    public function setDescription(string $description = null) : void
    {
        $this->description=$description;
    }

    public function getWorkflows() : ?string
    {
        return $this->workflows;
    }

    public function setWorkflows(string $workflows = null) : void
    {
        $this->workflows=$workflows;
    }
}
