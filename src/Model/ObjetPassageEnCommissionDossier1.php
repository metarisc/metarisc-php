<?php

namespace Metarisc\Model;

class ObjetPassageEnCommissionDossier1 extends ModelAbstract
{
    private ?\Metarisc\Model\ObjetPassageEnCommissionDossier1Avis $avis = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var array<array-key, mixed> $data['avis'] */
        $object->setAvis($data['avis']);

        return $object;
    }

    public function getAvis() : ?ObjetPassageEnCommissionDossier1Avis
    {
        return $this->avis;
    }

    public function setAvis(array $avis) : void
    {
        $this->avis=ObjetPassageEnCommissionDossier1Avis::unserialize($avis);
    }
}
