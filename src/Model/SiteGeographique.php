<?php

namespace Metarisc\Model;

/*
 * Les sites géographiques sont des lieux physiques où sont implantés des établissements recevant du public (ERP).
*/

class SiteGeographique extends ModelAbstract
{
    private ?string $id                      = null;
    private ?string $libelle                 = null;
    private ?string $geojson                 = null;
    private ?int $erp_periodicite_contrainte = null;
    private ?string $notes                   = null;
    private ?string $type                    = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['libelle'] */
        $object->setLibelle($data['libelle']);

        /** @var string $data['geojson'] */
        $object->setGeojson($data['geojson']);

        /** @var int $data['erp_periodicite_contrainte'] */
        $object->setErpPeriodiciteContrainte($data['erp_periodicite_contrainte']);

        /** @var string $data['notes'] */
        $object->setNotes($data['notes']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

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

    public function getLibelle() : ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle = null) : void
    {
        $this->libelle=$libelle;
    }

    public function getGeojson() : ?string
    {
        return $this->geojson;
    }

    public function setGeojson(string $geojson = null) : void
    {
        $this->geojson=$geojson;
    }

    public function getErpPeriodiciteContrainte() : ?int
    {
        return $this->erp_periodicite_contrainte;
    }

    public function setErpPeriodiciteContrainte(int $erp_periodicite_contrainte = null) : void
    {
        $this->erp_periodicite_contrainte=$erp_periodicite_contrainte;
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
