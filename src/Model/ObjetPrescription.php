<?php

namespace Metarisc\Model;

/*
 * La prescription réglementaire est une mesure de prévention et de sauvegarde propre à assurer la sécurité des personnes. Elle est décrite à travers un texte libre motivé par un ou des supports réglementaires. Le règlement de sécurité comprend des prescriptions générales communes à tous les établissements et d'autres particulières à chaque type d'établissement. Il précise les cas dans lesquels les obligations qu'il définit s'imposent à la fois aux constructeurs, propriétaires, installateurs et exploitants ou à certains de ceux-ci seulement.
*/

class ObjetPrescription extends ModelAbstract
{
    private ?string $contenu                   = null;
    private ?string $type                      = null;
    private ?array $supports_reglementaires_id = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['contenu'] */
        $object->setContenu($data['contenu']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var string[] $data['supports_reglementaires_id'] */
        $object->setSupportsReglementairesId($data['supports_reglementaires_id']);

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

    public function getSupportsReglementairesId() : ?array
    {
        return $this->supports_reglementaires_id;
    }

    public function setSupportsReglementairesId(array $supports_reglementaires_id = null) : void
    {
        $this->supports_reglementaires_id=$supports_reglementaires_id;
    }
}
