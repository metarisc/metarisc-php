<?php

namespace Metarisc\Model;

/*
 * Les sites géographiques sont des lieux physiques où sont implantés des établissements recevant du public (ERP).
*/

class ObjetSiteGOgraphique1 extends ModelAbstract
{
    private ?string $libelle = null;
    private ?string $notes   = null;
    private ?string $type    = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['libelle'] */
        $object->setLibelle($data['libelle']);

        /** @var string $data['notes'] */
        $object->setNotes($data['notes']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        return $object;
    }

    public function getLibelle() : ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle = null) : void
    {
        $this->libelle=$libelle;
    }

    public function getNotes() : ?string
    {
        return $this->notes;
    }

    public function setNotes(string $notes = null) : void
    {
        $this->notes=$notes;
    }

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
    }
}
