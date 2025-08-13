<?php

namespace Metarisc\Model;

/*
 * Workflow du traitement d'un dossier. Il représente une étape dans la vie du dossier.
*/

class ObjetWorkflow extends ModelAbstract
{
    private ?string $date_de_fin  = null;
    private ?string $etat         = null;
    private ?string $observations = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['date_de_fin'] */
        $object->setDateDeFin($data['date_de_fin']);

        /** @var string $data['etat'] */
        $object->setEtat($data['etat']);

        /** @var string $data['observations'] */
        $object->setObservations($data['observations']);

        return $object;
    }

    public function getDateDeFin() : ?string
    {
        return $this->date_de_fin;
    }

    public function setDateDeFin(?string $date_de_fin) : void
    {
        $this->date_de_fin = $date_de_fin;
    }

    public function getEtat() : ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat = null) : void
    {
        $this->etat=$etat;
    }

    public function getObservations() : ?string
    {
        return $this->observations;
    }

    public function setObservations(string $observations = null) : void
    {
        $this->observations=$observations;
    }
}
