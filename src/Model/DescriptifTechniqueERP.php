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
    private ?int $periodicite                           = null;
    private ?string $libelle                            = null;
    private ?string $observations_generales             = null;
    private ?\Metarisc\Model\Clicdvcrem $analyse_risque = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['date'] */
        $object->setDate($data['date']);

        /** @var string $data['statut'] */
        $object->setStatut($data['statut']);

        /** @var int $data['periodicite'] */
        $object->setPeriodicite($data['periodicite']);

        /** @var string $data['libelle'] */
        $object->setLibelle($data['libelle']);

        /** @var string $data['observations_generales'] */
        $object->setObservationsGenerales($data['observations_generales']);

        /** @var array<array-key, mixed> $data['analyse_risque'] */
        $object->setAnalyseRisque($data['analyse_risque']);

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

    public function getObservationsGenerales() : ?string
    {
        return $this->observations_generales;
    }

    public function setObservationsGenerales(string $observations_generales = null) : void
    {
        $this->observations_generales=$observations_generales;
    }

    public function getAnalyseRisque() : ?Clicdvcrem
    {
        return $this->analyse_risque;
    }

    public function setAnalyseRisque(array $analyse_risque) : void
    {
        $this->analyse_risque=Clicdvcrem::unserialize($analyse_risque);
    }
}
