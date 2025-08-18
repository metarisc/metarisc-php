<?php

namespace Metarisc\Model;

/*
 * Etablissement rattaché à l'ERP. Le rattachement permet de définir l'ERP courant comme une cellule commerciale ou un batiment non-isolé faisant partie d'un ERP plus grand.
*/

class ObjetERPEtablissementRattache extends ModelAbstract
{
    private ?string $erp_lie_id = null;
    private ?string $type       = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['erp_lie_id'] */
        $object->setErpLieId($data['erp_lie_id']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        return $object;
    }

    public function getErpLieId() : ?string
    {
        return $this->erp_lie_id;
    }

    public function setErpLieId(string $erp_lie_id = null) : void
    {
        $this->erp_lie_id=$erp_lie_id;
    }

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
    }
}
