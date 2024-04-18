<?php

namespace Metarisc\Model;

/*
 * Les établissements recevant du public (ERP) sont des bâtiments, des locaux ou des enceintes dans lesquels sont admises des personnes extérieures.
*/

class ERP extends ModelAbstract
{
    private ?string $id                                                   = null;
    private ?string $date_de_realisation                                  = null;
    private ?string $date_de_derniere_mise_a_jour                         = null;
    private ?array $references_exterieures                                = null;
    private ?\Metarisc\Model\AdressePostale $implantation                 = null;
    private ?\Metarisc\Model\DescriptifTechniqueERP $descriptif_technique = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['date_de_realisation'] */
        $object->setDateDeRealisation($data['date_de_realisation']);

        /** @var string $data['date_de_derniere_mise_a_jour'] */
        $object->setDateDeDerniereMiseAJour($data['date_de_derniere_mise_a_jour']);

        /** @var \Metarisc\Model\PEIReferencesExterieuresInner[] $data['references_exterieures'] */
        $object->setReferencesExterieures($data['references_exterieures']);

        /** @var array<array-key, mixed> $data['implantation'] */
        $object->setImplantation($data['implantation']);

        /** @var array<array-key, mixed> $data['descriptif_technique'] */
        $object->setDescriptifTechnique($data['descriptif_technique']);

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

    public function getImplantation() : ?AdressePostale
    {
        return $this->implantation;
    }

    public function setImplantation(array $implantation) : void
    {
        $this->implantation=AdressePostale::unserialize($implantation);
    }

    public function getDescriptifTechnique() : ?DescriptifTechniqueERP
    {
        return $this->descriptif_technique;
    }

    public function setDescriptifTechnique(array $descriptif_technique) : void
    {
        $this->descriptif_technique=DescriptifTechniqueERP::unserialize($descriptif_technique);
    }
}
