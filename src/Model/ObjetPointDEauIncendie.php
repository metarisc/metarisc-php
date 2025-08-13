<?php

namespace Metarisc\Model;

/*
 * Dispositif de lutte contre l'incendie.
*/

class ObjetPointDEauIncendie extends ModelAbstract
{
    private ?\Metarisc\Model\ObjetPointDEauIncendieDescriptifTechnique $descriptif_technique = null;
    private ?\Metarisc\Model\ObjetPointDEauIncendieImplantation $implantation                = null;
    private ?string $numero_compteur                                                         = null;
    private ?string $numero_serie_appareil                                                   = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var array<array-key, mixed> $data['descriptif_technique'] */
        $object->setDescriptifTechnique($data['descriptif_technique']);

        /** @var array<array-key, mixed> $data['implantation'] */
        $object->setImplantation($data['implantation']);

        /** @var string $data['numero_compteur'] */
        $object->setNumeroCompteur($data['numero_compteur']);

        /** @var string $data['numero_serie_appareil'] */
        $object->setNumeroSerieAppareil($data['numero_serie_appareil']);

        return $object;
    }

    public function getDescriptifTechnique() : ?ObjetPointDEauIncendieDescriptifTechnique
    {
        return $this->descriptif_technique;
    }

    public function setDescriptifTechnique(array $descriptif_technique) : void
    {
        $this->descriptif_technique=ObjetPointDEauIncendieDescriptifTechnique::unserialize($descriptif_technique);
    }

    public function getImplantation() : ?ObjetPointDEauIncendieImplantation
    {
        return $this->implantation;
    }

    public function setImplantation(array $implantation) : void
    {
        $this->implantation=ObjetPointDEauIncendieImplantation::unserialize($implantation);
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
}
