<?php

namespace Metarisc\Model;

/*
 * Dossier d'un DECI.
*/

class DossierDeci extends DossierBase
{
    private ?string $type             = null;
    private ?\Metarisc\Model\PEI $pei = null;

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type) : void
    {
        $this->type=$type;
    }

    public function getPei() : ?PEI
    {
        return $this->pei;
    }

    public function setPei(PEI $pei) : void
    {
        $this->pei=$pei;
    }
}
