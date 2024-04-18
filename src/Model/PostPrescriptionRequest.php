<?php

namespace Metarisc\Model;

class PostPrescriptionRequest extends ModelAbstract
{
    private ?string $contenu                = null;
    private ?string $type                   = null;
    private ?array $supports_reglementaires = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['contenu'] */
        $object->setContenu($data['contenu']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var \Metarisc\Model\PostPrescriptionRequestSupportsReglementairesInner[] $data['supports_reglementaires'] */
        $object->setSupportsReglementaires($data['supports_reglementaires']);

        return $object;
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
}
