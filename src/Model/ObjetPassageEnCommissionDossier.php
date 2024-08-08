<?php

namespace Metarisc\Model;

class ObjetPassageEnCommissionDossier extends ModelAbstract
{
    private ?string $dossier_id = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['dossier_id'] */
        $object->setDossierId($data['dossier_id']);

        return $object;
    }

    public function getDossierId() : ?string
    {
        return $this->dossier_id;
    }

    public function setDossierId(string $dossier_id = null) : void
    {
        $this->dossier_id=$dossier_id;
    }
}
