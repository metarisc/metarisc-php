<?php

namespace Metarisc\Model;

class Prescription extends ModelAbstract
{
    private ?string $id                        = null;
    private ?string $contenu                   = null;
    private ?string $type                      = null;
    private ?array $supports_reglementaires    = null;
    private ?array $supports_reglementaires_id = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['contenu'] */
        $object->setContenu($data['contenu']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var \Metarisc\Model\PrescriptionSupportReglementaire[] $data['supports_reglementaires'] */
        $object->setSupportsReglementaires($data['supports_reglementaires']);

        /** @var string[] $data['supports_reglementaires_id'] */
        $object->setSupportsReglementairesId($data['supports_reglementaires_id']);

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

    public function getContenu() : ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu = null) : void
    {
        $this->contenu=$contenu;
    }

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
    }

    public function getSupportsReglementaires() : ?array
    {
        return $this->supports_reglementaires;
    }

    public function setSupportsReglementaires(array $supports_reglementaires = null) : void
    {
        $this->supports_reglementaires=$supports_reglementaires;
    }

    public function getSupportsReglementairesId() : ?array
    {
        return $this->supports_reglementaires_id;
    }

    public function setSupportsReglementairesId(array $supports_reglementaires_id = null) : void
    {
        $this->supports_reglementaires_id=$supports_reglementaires_id;
    }
}
