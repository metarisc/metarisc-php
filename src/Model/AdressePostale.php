<?php

namespace Metarisc\Model;

/*
 * Représente une adresse postale permettant de localiser un POI.
*/

class AdressePostale
{
    private ?string $code_postal    = null;
    private ?string $commune        = null;
    private ?string $voie           = null;
    private ?string $code_insee     = null;
    private ?string $arrondissement = null;

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
}
