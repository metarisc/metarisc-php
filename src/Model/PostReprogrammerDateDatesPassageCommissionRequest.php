<?php

namespace Metarisc\Model;

class PostReprogrammerDateDatesPassageCommissionRequest extends ModelAbstract
{
    private ?string $nouvelle_date_debut = null;
    private ?string $nouvelle_date_fin   = null;
    private ?string $raison              = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['nouvelle_date_debut'] */
        $object->setNouvelleDateDebut($data['nouvelle_date_debut']);

        /** @var string $data['nouvelle_date_fin'] */
        $object->setNouvelleDateFin($data['nouvelle_date_fin']);

        /** @var string $data['raison'] */
        $object->setRaison($data['raison']);

        return $object;
    }

    public function getNouvelleDateDebut() : ?string
    {
        return $this->nouvelle_date_debut;
    }

    public function setNouvelleDateDebut(?string $nouvelle_date_debut) : void
    {
        $this->nouvelle_date_debut = $nouvelle_date_debut;
    }

    public function getNouvelleDateFin() : ?string
    {
        return $this->nouvelle_date_fin;
    }

    public function setNouvelleDateFin(?string $nouvelle_date_fin) : void
    {
        $this->nouvelle_date_fin = $nouvelle_date_fin;
    }

    public function getRaison() : ?string
    {
        return $this->raison;
    }

    public function setRaison(string $raison = null) : void
    {
        $this->raison=$raison;
    }
}
