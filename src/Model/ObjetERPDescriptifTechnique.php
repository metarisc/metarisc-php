<?php

namespace Metarisc\Model;

/*
 * Descriptif technique actuel de l'ERP.
*/

class ObjetERPDescriptifTechnique extends ModelAbstract
{
    private ?string $statut                                                               = null;
    private ?int $periodicite                                                             = null;
    private ?string $libelle                                                              = null;
    private ?string $observations_generales                                               = null;
    private ?\Metarisc\Model\ObjetDescriptifTechniqueERPBaseAnalyseRisque $analyse_risque = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

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

    public function getAnalyseRisque() : ?ObjetDescriptifTechniqueERPBaseAnalyseRisque
    {
        return $this->analyse_risque;
    }

    public function setAnalyseRisque(array $analyse_risque) : void
    {
        $this->analyse_risque=ObjetDescriptifTechniqueERPBaseAnalyseRisque::unserialize($analyse_risque);
    }
}
