<?php

namespace Metarisc\Model;

/*
 * Représente une adresse postale permettant de localiser un POI.
*/

class AdressePostale extends ModelAbstract
{
    private ?string $code_postal                 = null;
    private ?string $commune                     = null;
    private ?string $voie                        = null;
    private ?string $code_insee                  = null;
    private ?string $arrondissement              = null;
    private ?float $latitude                     = null;
    private ?float $longitude                    = null;
    private ?string $localisation_operationnelle = null;
    private ?string $complement                  = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['code_postal'] */
        $object->setCodePostal($data['code_postal']);

        /** @var string $data['commune'] */
        $object->setCommune($data['commune']);

        /** @var string $data['voie'] */
        $object->setVoie($data['voie']);

        /** @var string $data['code_insee'] */
        $object->setCodeInsee($data['code_insee']);

        /** @var string $data['arrondissement'] */
        $object->setArrondissement($data['arrondissement']);

        /** @var float $data['latitude'] */
        $object->setLatitude($data['latitude']);

        /** @var float $data['longitude'] */
        $object->setLongitude($data['longitude']);

        /** @var string $data['localisation_operationnelle'] */
        $object->setLocalisationOperationnelle($data['localisation_operationnelle']);

        /** @var string $data['complement'] */
        $object->setComplement($data['complement']);

        return $object;
    }

    public function getCodePostal() : ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal = null) : void
    {
        $this->code_postal=$code_postal;
    }

    public function getCommune() : ?string
    {
        return $this->commune;
    }

    public function setCommune(string $commune = null) : void
    {
        $this->commune=$commune;
    }

    public function getVoie() : ?string
    {
        return $this->voie;
    }

    public function setVoie(string $voie = null) : void
    {
        $this->voie=$voie;
    }

    public function getCodeInsee() : ?string
    {
        return $this->code_insee;
    }

    public function setCodeInsee(string $code_insee = null) : void
    {
        $this->code_insee=$code_insee;
    }

    public function getArrondissement() : ?string
    {
        return $this->arrondissement;
    }

    public function setArrondissement(string $arrondissement = null) : void
    {
        $this->arrondissement=$arrondissement;
    }

    public function getLatitude() : ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude = null) : void
    {
        $this->latitude=$latitude;
    }

    public function getLongitude() : ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude = null) : void
    {
        $this->longitude=$longitude;
    }

    public function getLocalisationOperationnelle() : ?string
    {
        return $this->localisation_operationnelle;
    }

    public function setLocalisationOperationnelle(string $localisation_operationnelle = null) : void
    {
        $this->localisation_operationnelle=$localisation_operationnelle;
    }

    public function getComplement() : ?string
    {
        return $this->complement;
    }

    public function setComplement(string $complement = null) : void
    {
        $this->complement=$complement;
    }
}
