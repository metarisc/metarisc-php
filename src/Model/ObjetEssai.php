<?php

namespace Metarisc\Model;

/*
 * Objet représentant un essai réalisé dans le cadre d'une visite d'un ERP.
*/

class ObjetEssai extends ModelAbstract
{
    private ?string $localisation                   = null;
    private ?string $libelle                        = null;
    private ?bool $concluant                        = null;
    private ?string $observations_sur_les_resultats = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['localisation'] */
        $object->setLocalisation($data['localisation']);

        /** @var string $data['libelle'] */
        $object->setLibelle($data['libelle']);

        /** @var bool $data['concluant'] */
        $object->setConcluant($data['concluant']);

        /** @var string $data['observations_sur_les_resultats'] */
        $object->setObservationsSurLesResultats($data['observations_sur_les_resultats']);

        return $object;
    }

    public function getLocalisation() : ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation = null) : void
    {
        $this->localisation=$localisation;
    }

    public function getLibelle() : ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle = null) : void
    {
        $this->libelle=$libelle;
    }

    public function getConcluant() : ?bool
    {
        return $this->concluant;
    }

    public function setConcluant(bool $concluant = null) : void
    {
        $this->concluant=$concluant;
    }

    public function getObservationsSurLesResultats() : ?string
    {
        return $this->observations_sur_les_resultats;
    }

    public function setObservationsSurLesResultats(string $observations_sur_les_resultats = null) : void
    {
        $this->observations_sur_les_resultats=$observations_sur_les_resultats;
    }
}
