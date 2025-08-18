<?php

namespace Metarisc\Model;

/*
 * Descriptif technique d'un PENA - Point d'Eau Naturel ou Artificiel.
*/

class ObjetDescriptifTechniqueDECIPENA extends ModelAbstract
{
    private ?string $type                   = null;
    private ?string $domanialite            = null;
    private ?string $observations_generales = null;
    private ?string $statut                 = null;
    private ?string $nature                 = null;
    private ?float $volume                  = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var string $data['domanialite'] */
        $object->setDomanialite($data['domanialite']);

        /** @var string $data['observations_generales'] */
        $object->setObservationsGenerales($data['observations_generales']);

        /** @var string $data['statut'] */
        $object->setStatut($data['statut']);

        /** @var string $data['nature'] */
        $object->setNature($data['nature']);

        /** @var float $data['volume'] */
        $object->setVolume($data['volume']);

        return $object;
    }

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
    }

    public function getDomanialite() : ?string
    {
        return $this->domanialite;
    }

    public function setDomanialite(string $domanialite = null) : void
    {
        $this->domanialite=$domanialite;
    }

    public function getObservationsGenerales() : ?string
    {
        return $this->observations_generales;
    }

    public function setObservationsGenerales(string $observations_generales = null) : void
    {
        $this->observations_generales=$observations_generales;
    }

    public function getStatut() : ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut = null) : void
    {
        $this->statut=$statut;
    }

    public function getNature() : ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature = null) : void
    {
        $this->nature=$nature;
    }

    public function getVolume() : ?float
    {
        return $this->volume;
    }

    public function setVolume(float $volume = null) : void
    {
        $this->volume=$volume;
    }
}
