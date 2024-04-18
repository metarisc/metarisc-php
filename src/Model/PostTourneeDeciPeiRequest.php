<?php

namespace Metarisc\Model;

class PostTourneeDeciPeiRequest extends ModelAbstract
{
    private ?string $pei_id = null;
    private ?int $ordre     = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['pei_id'] */
        $object->setPeiId($data['pei_id']);

        /** @var int $data['ordre'] */
        $object->setOrdre($data['ordre']);

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

    public function getOrdre() : ?int
    {
        return $this->ordre;
    }

    public function setOrdre(int $ordre = null) : void
    {
        $this->ordre=$ordre;
    }
}
