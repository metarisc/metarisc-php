<?php

namespace Metarisc\Model;

/*
 * Objet de contrôle d'un PEI dans le cadre d'une Tournée DECI
*/

class ObjetTournEDeciPEI1 extends ModelAbstract
{
    private ?string $pei_id = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['pei_id'] */
        $object->setPeiId($data['pei_id']);

        return $object;
    }

    public function getPeiId() : ?string
    {
        return $this->pei_id;
    }

    public function setPeiId(string $pei_id = null) : void
    {
        $this->pei_id=$pei_id;
    }
}
