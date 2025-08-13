<?php

namespace Metarisc\Model;

/*
 * Liaison entre une prescription et une analyse de risque sur un dossier. Elle est motivée par un facteur de dangerosité et des mesures compensatoires et complémentaires.
*/

class ObjetPrescriptionAnalyseDeRisque extends ModelAbstract
{
    private ?string $contenu                   = null;
    private ?string $type                      = null;
    private ?array $supports_reglementaires_id = null;
    private ?int $numero                       = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['contenu'] */
        $object->setContenu($data['contenu']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var string[] $data['supports_reglementaires_id'] */
        $object->setSupportsReglementairesId($data['supports_reglementaires_id']);

        /** @var int $data['numero'] */
        $object->setNumero($data['numero']);

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

    public function getNumero() : ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero = null) : void
    {
        $this->numero=$numero;
    }
}
