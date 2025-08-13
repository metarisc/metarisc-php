<?php

namespace Metarisc\Model;

/*
 * La prescription réglementaire est une mesure de prévention et de sauvegarde propre à assurer la sécurité des personnes. Elle est décrite à travers un texte libre motivé par un ou des supports réglementaires. Le règlement de sécurité comprend des prescriptions générales communes à tous les établissements et d'autres particulières à chaque type d'établissement. Il précise les cas dans lesquels les obligations qu'il définit s'imposent à la fois aux constructeurs, propriétaires, installateurs et exploitants ou à certains de ceux-ci seulement.
*/

class Prescription extends ModelAbstract
{
    private ?string $id                     = null;
    private ?string $contenu                = null;
    private ?string $type                   = null;
    private ?array $supports_reglementaires = null;

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
}
