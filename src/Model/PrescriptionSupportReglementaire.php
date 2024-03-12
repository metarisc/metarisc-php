<?php

namespace Metarisc\Model;

class PrescriptionSupportReglementaire extends ModelAbstract
{
    private ?string $id             = null;
    private ?string $nature         = null;
    private ?string $legifrance_cid = null;
    private ?string $contenu        = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['nature'] */
        $object->setNature($data['nature']);

        /** @var string $data['legifrance_cid'] */
        $object->setLegifranceCid($data['legifrance_cid']);

        /** @var string $data['contenu'] */
        $object->setContenu($data['contenu']);

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

    public function getNature() : ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature = null) : void
    {
        $this->nature=$nature;
    }

    public function getLegifranceCid() : ?string
    {
        return $this->legifrance_cid;
    }

    public function setLegifranceCid(string $legifrance_cid = null) : void
    {
        $this->legifrance_cid=$legifrance_cid;
    }

    public function getContenu() : ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu = null) : void
    {
        $this->contenu=$contenu;
    }
}
