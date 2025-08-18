<?php

namespace Metarisc\Model;

class ObjetPassageEnCommissionDossier extends ModelAbstract
{
    private ?string $dossier_id      = null;
    private ?string $date_de_passage = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['dossier_id'] */
        $object->setDossierId($data['dossier_id']);

        /** @var string $data['date_de_passage'] */
        $object->setDateDePassage($data['date_de_passage']);

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

    public function getDateDePassage() : ?string
    {
        return $this->date_de_passage;
    }

    public function setDateDePassage(?string $date_de_passage) : void
    {
        $this->date_de_passage = $date_de_passage;
    }
}
