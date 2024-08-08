<?php

namespace Metarisc\Model;

/*
 * Dispositif de lutte contre l'incendie.
*/

class ObjetPointDEauIncendie extends ModelAbstract
{
    private ?array $references_exterieures                                    = null;
    private ?\Metarisc\Model\ObjetPointDEauIncendieImplantation $implantation = null;
    private ?string $numero                                                   = null;
    private ?string $numero_compteur                                          = null;
    private ?string $numero_serie_appareil                                    = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var \Metarisc\Model\ObjetRFRenceExtRieure[] $data['references_exterieures'] */
        $object->setReferencesExterieures($data['references_exterieures']);

        /** @var array<array-key, mixed> $data['implantation'] */
        $object->setImplantation($data['implantation']);

        /** @var string $data['numero'] */
        $object->setNumero($data['numero']);

        /** @var string $data['numero_compteur'] */
        $object->setNumeroCompteur($data['numero_compteur']);

        /** @var string $data['numero_serie_appareil'] */
        $object->setNumeroSerieAppareil($data['numero_serie_appareil']);

        return $object;
    }

    public function getReferencesExterieures() : ?array
    {
        return $this->references_exterieures;
    }

    public function setReferencesExterieures(array $references_exterieures = null) : void
    {
        $this->references_exterieures=$references_exterieures;
    }

    public function getImplantation() : ?ObjetPointDEauIncendieImplantation
    {
        return $this->implantation;
    }

    public function setImplantation(array $implantation) : void
    {
        $this->implantation=ObjetPointDEauIncendieImplantation::unserialize($implantation);
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
}
