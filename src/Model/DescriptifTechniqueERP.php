<?php

namespace Metarisc\Model;

/*
 * Descriptif technique associé à un ERP.
*/

class DescriptifTechniqueERP extends ModelAbstract
{
    private ?string $id                                 = null;
    private ?string $date                               = null;
    private ?string $statut                             = null;
    private ?int $categorie                             = null;
    private ?\Metarisc\Model\ActiviteErp $type_activite = null;
    private ?array $types_activites_secondaires         = null;
    private ?int $periodicite                           = null;
    private ?string $libelle                            = null;
    private ?bool $presence_locaux_sommeil              = null;
    private ?string $observations_generales             = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['date'] */
        $object->setDate($data['date']);

        /** @var string $data['statut'] */
        $object->setStatut($data['statut']);

        /** @var int $data['categorie'] */
        $object->setCategorie($data['categorie']);

        /** @var array<array-key, mixed> $data['type_activite'] */
        $object->setTypeActivite($data['type_activite']);

        /** @var \Metarisc\Model\ActiviteErp[] $data['types_activites_secondaires'] */
        $object->setTypesActivitesSecondaires($data['types_activites_secondaires']);

        /** @var int $data['periodicite'] */
        $object->setPeriodicite($data['periodicite']);

        /** @var string $data['libelle'] */
        $object->setLibelle($data['libelle']);

        /** @var bool $data['presence_locaux_sommeil'] */
        $object->setPresenceLocauxSommeil($data['presence_locaux_sommeil']);

        /** @var string $data['observations_generales'] */
        $object->setObservationsGenerales($data['observations_generales']);

        return $object;
    }

    public function getId() : ?string
    {
        return $this->id;
    }

    public function setId(string $id = null) : void
    {
        $this->id=$id;
    }

    public function getDate() : ?string
    {
        return $this->date;
    }

    public function setDate(?string $date) : void
    {
        $this->date = $date;
    }

    public function getStatut() : ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut = null) : void
    {
        $this->statut=$statut;
    }

    public function getCategorie() : ?int
    {
        return $this->categorie;
    }

    public function setCategorie(int $categorie = null) : void
    {
        $this->categorie=$categorie;
    }

    public function getTypeActivite() : ?ActiviteErp
    {
        return $this->type_activite;
    }

    public function setTypeActivite(array $type_activite) : void
    {
        $this->type_activite=ActiviteErp::unserialize($type_activite);
    }

    public function getTypesActivitesSecondaires() : ?array
    {
        return $this->types_activites_secondaires;
    }

    public function setTypesActivitesSecondaires(array $types_activites_secondaires = null) : void
    {
        $this->types_activites_secondaires=$types_activites_secondaires;
    }

    public function getPeriodicite() : ?int
    {
        return $this->periodicite;
    }

    public function setPeriodicite(int $periodicite = null) : void
    {
        $this->periodicite=$periodicite;
    }

    public function getLibelle() : ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle = null) : void
    {
        $this->libelle=$libelle;
    }

    public function getPresenceLocauxSommeil() : ?bool
    {
        return $this->presence_locaux_sommeil;
    }

    public function setPresenceLocauxSommeil(bool $presence_locaux_sommeil = null) : void
    {
        $this->presence_locaux_sommeil=$presence_locaux_sommeil;
    }

    public function getObservationsGenerales() : ?string
    {
        return $this->observations_generales;
    }

    public function setObservationsGenerales(string $observations_generales = null) : void
    {
        $this->observations_generales=$observations_generales;
    }
}
