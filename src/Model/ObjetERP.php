<?php

namespace Metarisc\Model;

/*
 * Les établissements recevant du public (ERP) sont des bâtiments, des locaux ou des enceintes dans lesquels sont admises des personnes extérieures.
*/

class ObjetERP extends ModelAbstract
{
    private ?array $references_exterieures                      = null;
    private ?\Metarisc\Model\ObjetERPImplantation $implantation = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var \Metarisc\Model\ObjetRFRenceExtRieure[] $data['references_exterieures'] */
        $object->setReferencesExterieures($data['references_exterieures']);

        /** @var array<array-key, mixed> $data['implantation'] */
        $object->setImplantation($data['implantation']);

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

    public function getImplantation() : ?ObjetERPImplantation
    {
        return $this->implantation;
    }

    public function setImplantation(array $implantation) : void
    {
        $this->implantation=ObjetERPImplantation::unserialize($implantation);
    }
}
