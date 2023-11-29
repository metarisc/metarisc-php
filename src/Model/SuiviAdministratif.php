<?php

namespace Metarisc\Model;

class SuiviAdministratif extends ModelAbstract
{
    private ?string $description         = null;
    private ?string $date_ajout          = null;
    private ?bool $evenement_automatique = null;
    private ?string $createur            = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['description'] */
        $object->setDescription($data['description']);

        /** @var string $data['date_ajout'] */
        $object->setDateAjout($data['date_ajout']);

        /** @var bool $data['evenement_automatique'] */
        $object->setEvenementAutomatique($data['evenement_automatique']);

        /** @var string $data['createur'] */
        $object->setCreateur($data['createur']);

        return $object;
    }

    public function getDescription() : ?string
    {
        return $this->description;
    }

    public function setDescription(string $description = null) : void
    {
        $this->description=$description;
    }

    public function getDateAjout() : ?string
    {
        return $this->date_ajout;
    }

    public function setDateAjout(?string $date_ajout) : void
    {
        $this->date_ajout = $date_ajout;
    }

    public function getEvenementAutomatique() : ?bool
    {
        return $this->evenement_automatique;
    }

    public function setEvenementAutomatique(bool $evenement_automatique = null) : void
    {
        $this->evenement_automatique=$evenement_automatique;
    }

    public function getCreateur() : ?string
    {
        return $this->createur;
    }

    public function setCreateur(string $createur = null) : void
    {
        $this->createur=$createur;
    }
}
