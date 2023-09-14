<?php

namespace Metarisc\Model;

class DescriptifTechniqueBase
{
    private ?string $libelle                = null;
    private ?string $observations_generales = null;
    private ?\DateTime $date                = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['libelle'] */
        $object->setLibelle($data['libelle']);

        /** @var string $data['observations_generales'] */
        $object->setObservationsGenerales($data['observations_generales']);

        /** @var string $data['date'] */
        $object->setDate($data['date']);

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

    public function getObservationsGenerales() : ?string
    {
        return $this->observations_generales;
    }

    public function setObservationsGenerales(string $observations_generales = null) : void
    {
        $this->observations_generales=$observations_generales;
    }

    public function getDate() : ?\DateTime
    {
        return $this->date;
    }

    public function setDate(?string $date) : void
    {
        $this->date = (\is_string($date)) ? \DateTime::createFromFormat(\DATE_ATOM, $date) : null;
    }
}
