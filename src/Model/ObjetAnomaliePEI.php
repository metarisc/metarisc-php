<?php

namespace Metarisc\Model;

/*
 * Association d'une Anomalie DECI sur un PEI.
*/

class ObjetAnomaliePEI extends ModelAbstract
{
    private ?int $code_anomalie = null;
    private ?string $date_debut = null;
    private ?string $date_fin   = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var int $data['code_anomalie'] */
        $object->setCodeAnomalie($data['code_anomalie']);

        /** @var string $data['date_debut'] */
        $object->setDateDebut($data['date_debut']);

        /** @var string $data['date_fin'] */
        $object->setDateFin($data['date_fin']);

        return $object;
    }

    public function getCodeAnomalie() : ?int
    {
        return $this->code_anomalie;
    }

    public function setCodeAnomalie(int $code_anomalie = null) : void
    {
        $this->code_anomalie=$code_anomalie;
    }

    public function getDateDebut() : ?string
    {
        return $this->date_debut;
    }

    public function setDateDebut(?string $date_debut) : void
    {
        $this->date_debut = $date_debut;
    }

    public function getDateFin() : ?string
    {
        return $this->date_fin;
    }

    public function setDateFin(?string $date_fin) : void
    {
        $this->date_fin = $date_fin;
    }
}
