<?php

namespace Metarisc\Model;

/*
 * Dispositif de lutte contre l'incendie.
*/

class PEI extends ModelAbstract
{
    private ?string $id                                                    = null;
    private ?string $date_de_realisation                                   = null;
    private ?string $date_de_derniere_mise_a_jour                          = null;
    private ?array $references_exterieures                                 = null;
    private ?\Metarisc\Model\DescriptifTechniqueDECI $descriptif_technique = null;
    private ?\Metarisc\Model\AdressePostale $implantation                  = null;
    private ?string $numero                                                = null;
    private ?string $numero_compteur                                       = null;
    private ?string $numero_serie_appareil                                 = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['date_de_realisation'] */
        $object->setDateDeRealisation($data['date_de_realisation']);

        /** @var string $data['date_de_derniere_mise_a_jour'] */
        $object->setDateDeDerniereMiseAJour($data['date_de_derniere_mise_a_jour']);

        /** @var \Metarisc\Model\ReferenceExterieure[] $data['references_exterieures'] */
        $object->setReferencesExterieures($data['references_exterieures']);

        /** @var array<array-key, mixed> $data['descriptif_technique'] */
        $object->setDescriptifTechnique($data['descriptif_technique']);

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

    public function getId() : ?string
    {
        return $this->id;
    }

    public function setId(string $id = null) : void
    {
        $this->id=$id;
    }

    public function getDateDeRealisation() : ?string
    {
        return $this->date_de_realisation;
    }

    public function setDateDeRealisation(?string $date_de_realisation) : void
    {
        $this->date_de_realisation = $date_de_realisation;
    }

    public function getDateDeDerniereMiseAJour() : ?string
    {
        return $this->date_de_derniere_mise_a_jour;
    }

    public function setDateDeDerniereMiseAJour(?string $date_de_derniere_mise_a_jour) : void
    {
        $this->date_de_derniere_mise_a_jour = $date_de_derniere_mise_a_jour;
    }

    public function getReferencesExterieures() : ?array
    {
        return $this->references_exterieures;
    }

    public function setReferencesExterieures(array $references_exterieures = null) : void
    {
        $this->references_exterieures=$references_exterieures;
    }

    public function getDescriptifTechnique() : ?DescriptifTechniqueDECI
    {
        return $this->descriptif_technique;
    }

    public function setDescriptifTechnique(array $descriptif_technique) : void
    {
        $this->descriptif_technique=DescriptifTechniqueDECI::unserialize($descriptif_technique);
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
}
