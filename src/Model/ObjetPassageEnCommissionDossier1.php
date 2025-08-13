<?php

namespace Metarisc\Model;

class ObjetPassageEnCommissionDossier1 extends ModelAbstract
{
    private ?string $avis            = null;
    private ?bool $ge4_3             = null;
    private ?string $date_de_passage = null;
    private ?bool $avis_differe      = null;
    private ?string $observations    = null;
    private ?int $duree_minutes      = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['avis'] */
        $object->setAvis($data['avis']);

        /** @var bool $data['ge4_3'] */
        $object->setGe43($data['ge4_3']);

        /** @var string $data['date_de_passage'] */
        $object->setDateDePassage($data['date_de_passage']);

        /** @var bool $data['avis_differe'] */
        $object->setAvisDiffere($data['avis_differe']);

        /** @var string $data['observations'] */
        $object->setObservations($data['observations']);

        /** @var int $data['duree_minutes'] */
        $object->setDureeMinutes($data['duree_minutes']);

        return $object;
    }

    public function getAvis() : ?string
    {
        return $this->avis;
    }

    public function setAvis(string $avis = null) : void
    {
        $this->avis=$avis;
    }

    public function getGe43() : ?bool
    {
        return $this->ge4_3;
    }

    public function setGe43(bool $ge4_3 = null) : void
    {
        $this->ge4_3=$ge4_3;
    }

    public function getDateDePassage() : ?string
    {
        return $this->date_de_passage;
    }

    public function setDateDePassage(?string $date_de_passage) : void
    {
        $this->date_de_passage = $date_de_passage;
    }

    public function getAvisDiffere() : ?bool
    {
        return $this->avis_differe;
    }

    public function setAvisDiffere(bool $avis_differe = null) : void
    {
        $this->avis_differe=$avis_differe;
    }

    public function getObservations() : ?string
    {
        return $this->observations;
    }

    public function setObservations(string $observations = null) : void
    {
        $this->observations=$observations;
    }

    public function getDureeMinutes() : ?int
    {
        return $this->duree_minutes;
    }

    public function setDureeMinutes(int $duree_minutes = null) : void
    {
        $this->duree_minutes=$duree_minutes;
    }
}
