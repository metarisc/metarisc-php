<?php

namespace Metarisc\Model;

class PostPeiRequest extends ModelAbstract
{
    private ?\Metarisc\Model\AdressePostale $implantation                  = null;
    private ?string $numero                                                = null;
    private ?string $numero_compteur                                       = null;
    private ?string $numero_serie_appareil                                 = null;
    private ?\Metarisc\Model\DescriptifTechniqueDECI $descriptif_technique = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var array<array-key, mixed> $data['implantation'] */
        $object->setImplantation($data['implantation']);

        /** @var string $data['numero'] */
        $object->setNumero($data['numero']);

        /** @var string $data['numero_compteur'] */
        $object->setNumeroCompteur($data['numero_compteur']);

        /** @var string $data['numero_serie_appareil'] */
        $object->setNumeroSerieAppareil($data['numero_serie_appareil']);

        /** @var array<array-key, mixed> $data['descriptif_technique'] */
        $object->setDescriptifTechnique($data['descriptif_technique']);

        return $object;
    }

    public function getImplantation() : ?AdressePostale
    {
        return $this->implantation;
    }

    public function setImplantation(array $implantation) : void
    {
        $this->implantation=AdressePostale::unserialize($implantation);
    }

    public function getNumero() : ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero = null) : void
    {
        $this->numero=$numero;
    }

    public function getNumeroCompteur() : ?string
    {
        return $this->numero_compteur;
    }

    public function setNumeroCompteur(string $numero_compteur = null) : void
    {
        $this->numero_compteur=$numero_compteur;
    }

    public function getNumeroSerieAppareil() : ?string
    {
        return $this->numero_serie_appareil;
    }

    public function setNumeroSerieAppareil(string $numero_serie_appareil = null) : void
    {
        $this->numero_serie_appareil=$numero_serie_appareil;
    }

    public function getDescriptifTechnique() : ?DescriptifTechniqueDECI
    {
        return $this->descriptif_technique;
    }

    public function setDescriptifTechnique(array $descriptif_technique) : void
    {
        $this->descriptif_technique=DescriptifTechniqueDECI::unserialize($descriptif_technique);
    }
}
