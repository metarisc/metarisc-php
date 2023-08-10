<?php

namespace Metarisc\Models;

class SuiviAdministratif
{
    private ?string $description         = null;
    private ?\DateTime $date_ajout       = null;
    private ?bool $evenement_automatique = null;
    private ?string $createur            = null;
    public function getDescription() : ?string
    {
        return $this->description;
    }

    public function setDescription(string $description) : void
    {
        $this->description=$description;
    }

    public function getDateAjout() : ?\DateTime
    {
        return $this->date_ajout;
    }

    public function setDateAjout(\DateTime $date_ajout) : void
    {
        $this->date_ajout=$date_ajout;
    }

    public function getEvenementAutomatique() : ?bool
    {
        return $this->evenement_automatique;
    }

    public function setEvenementAutomatique(bool $evenement_automatique) : void
    {
        $this->evenement_automatique=$evenement_automatique;
    }

    public function getCreateur() : ?string
    {
        return $this->createur;
    }

    public function setCreateur(string $createur) : void
    {
        $this->createur=$createur;
    }
}
