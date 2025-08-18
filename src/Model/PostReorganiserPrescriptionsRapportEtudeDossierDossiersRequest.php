<?php

namespace Metarisc\Model;

class PostReorganiserPrescriptionsRapportEtudeDossierDossiersRequest extends ModelAbstract
{
    private ?array $prescriptions = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var \Metarisc\Model\PostReorganiserPrescriptionsRapportEtudeDossierDossiersRequestPrescriptionsInner[] $data['prescriptions'] */
        $object->setPrescriptions($data['prescriptions']);

        return $object;
    }

    public function getPrescriptions() : ?array
    {
        return $this->prescriptions;
    }

    public function setPrescriptions(array $prescriptions = null) : void
    {
        $this->prescriptions=$prescriptions;
    }
}
