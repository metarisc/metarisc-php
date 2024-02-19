<?php

namespace Metarisc\Model;

class AnomaliePEI extends ModelAbstract
{
    private ?\Metarisc\Model\AnomalieDECI $anomalie = null;
    private ?string $date_debut                     = null;
    private ?string $date_fin                       = null;
    private ?bool $est_programmee                   = null;
    private ?string $date_pose                      = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var array<array-key, mixed> $data['anomalie'] */
        $object->setAnomalie($data['anomalie']);

        /** @var string $data['date_debut'] */
        $object->setDateDebut($data['date_debut']);

        /** @var string $data['date_fin'] */
        $object->setDateFin($data['date_fin']);

        /** @var bool $data['est_programmee'] */
        $object->setEstProgrammee($data['est_programmee']);

        /** @var string $data['date_pose'] */
        $object->setDatePose($data['date_pose']);

        return $object;
    }

    public function getAnomalie() : ?AnomalieDECI
    {
        return $this->anomalie;
    }

    public function setAnomalie(array $anomalie) : void
    {
        $this->anomalie=AnomalieDECI::unserialize($anomalie);
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

    public function getEstProgrammee() : ?bool
    {
        return $this->est_programmee;
    }

    public function setEstProgrammee(bool $est_programmee = null) : void
    {
        $this->est_programmee=$est_programmee;
    }

    public function getDatePose() : ?string
    {
        return $this->date_pose;
    }

    public function setDatePose(?string $date_pose) : void
    {
        $this->date_pose = $date_pose;
    }
}
