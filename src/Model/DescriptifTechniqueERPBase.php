<?php

namespace Metarisc\Model;

class DescriptifTechniqueERPBase extends ModelAbstract
{
    private ?string $id                              = null;
    private ?string $date                            = null;
    private ?string $statut_erp                      = null;
    private ?bool $est_disponible                    = null;
    private ?string $genre                           = null;
    private ?\Metarisc\Model\Avis $avis_exploitation = null;
    private ?int $categorie                          = null;
    private ?array $types_activites                  = null;
    private ?int $periodicite                        = null;
    private ?string $libelle                         = null;
    private ?string $effectifs                       = null;
    private ?bool $presence_locaux_sommeil           = null;
    private ?string $descriptif_general              = null;
    private ?string $descriptif_technique            = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['date'] */
        $object->setDate($data['date']);

        /** @var string $data['statut_erp'] */
        $object->setStatutErp($data['statut_erp']);

        /** @var bool $data['est_disponible'] */
        $object->setEstDisponible($data['est_disponible']);

        /** @var string $data['genre'] */
        $object->setGenre($data['genre']);

        /** @var array<array-key, mixed> $data['avis_exploitation'] */
        $object->setAvisExploitation($data['avis_exploitation']);

        /** @var int $data['categorie'] */
        $object->setCategorie($data['categorie']);

        /** @var \Metarisc\Model\ActiviteErp[] $data['types_activites'] */
        $object->setTypesActivites($data['types_activites']);

        /** @var int $data['periodicite'] */
        $object->setPeriodicite($data['periodicite']);

        /** @var string $data['libelle'] */
        $object->setLibelle($data['libelle']);

        /** @var string $data['effectifs'] */
        $object->setEffectifs($data['effectifs']);

        /** @var bool $data['presence_locaux_sommeil'] */
        $object->setPresenceLocauxSommeil($data['presence_locaux_sommeil']);

        /** @var string $data['descriptif_general'] */
        $object->setDescriptifGeneral($data['descriptif_general']);

        /** @var string $data['descriptif_technique'] */
        $object->setDescriptifTechnique($data['descriptif_technique']);

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

    public function getStatutErp() : ?string
    {
        return $this->statut_erp;
    }

    public function setStatutErp(string $statut_erp = null) : void
    {
        $this->statut_erp=$statut_erp;
    }

    public function getEstDisponible() : ?bool
    {
        return $this->est_disponible;
    }

    public function setEstDisponible(bool $est_disponible = null) : void
    {
        $this->est_disponible=$est_disponible;
    }

    public function getGenre() : ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre = null) : void
    {
        $this->genre=$genre;
    }

    public function getAvisExploitation() : ?Avis
    {
        return $this->avis_exploitation;
    }

    public function setAvisExploitation(array $avis_exploitation) : void
    {
        $this->avis_exploitation=Avis::unserialize($avis_exploitation);
    }

    public function getCategorie() : ?int
    {
        return $this->categorie;
    }

    public function setCategorie(int $categorie = null) : void
    {
        $this->categorie=$categorie;
    }

    public function getTypesActivites() : ?array
    {
        return $this->types_activites;
    }

    public function setTypesActivites(array $types_activites = null) : void
    {
        $this->types_activites=$types_activites;
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

    public function getEffectifs() : ?string
    {
        return $this->effectifs;
    }

    public function setEffectifs(string $effectifs = null) : void
    {
        $this->effectifs=$effectifs;
    }

    public function getPresenceLocauxSommeil() : ?bool
    {
        return $this->presence_locaux_sommeil;
    }

    public function setPresenceLocauxSommeil(bool $presence_locaux_sommeil = null) : void
    {
        $this->presence_locaux_sommeil=$presence_locaux_sommeil;
    }

    public function getDescriptifGeneral() : ?string
    {
        return $this->descriptif_general;
    }

    public function setDescriptifGeneral(string $descriptif_general = null) : void
    {
        $this->descriptif_general=$descriptif_general;
    }

    public function getDescriptifTechnique() : ?string
    {
        return $this->descriptif_technique;
    }

    public function setDescriptifTechnique(string $descriptif_technique = null) : void
    {
        $this->descriptif_technique=$descriptif_technique;
    }
}
