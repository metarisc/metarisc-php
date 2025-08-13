<?php

namespace Metarisc\Model;

/*
 * Ensemble des préférences et paramètres pour la gestion d'une commission.
*/

class ObjetCommissionPrFRences extends ModelAbstract
{
    private ?string $rapport_modele_cr        = null;
    private ?string $rapport_modele_pv        = null;
    private ?string $rapport_modele_cr_global = null;
    private ?string $rapport_modele_convoc    = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['rapport_modele_cr'] */
        $object->setRapportModeleCr($data['rapport_modele_cr']);

        /** @var string $data['rapport_modele_pv'] */
        $object->setRapportModelePv($data['rapport_modele_pv']);

        /** @var string $data['rapport_modele_cr_global'] */
        $object->setRapportModeleCrGlobal($data['rapport_modele_cr_global']);

        /** @var string $data['rapport_modele_convoc'] */
        $object->setRapportModeleConvoc($data['rapport_modele_convoc']);

        return $object;
    }

    public function getRapportModeleCr() : ?string
    {
        return $this->rapport_modele_cr;
    }

    public function setRapportModeleCr(string $rapport_modele_cr = null) : void
    {
        $this->rapport_modele_cr=$rapport_modele_cr;
    }

    public function getRapportModelePv() : ?string
    {
        return $this->rapport_modele_pv;
    }

    public function setRapportModelePv(string $rapport_modele_pv = null) : void
    {
        $this->rapport_modele_pv=$rapport_modele_pv;
    }

    public function getRapportModeleCrGlobal() : ?string
    {
        return $this->rapport_modele_cr_global;
    }

    public function setRapportModeleCrGlobal(string $rapport_modele_cr_global = null) : void
    {
        $this->rapport_modele_cr_global=$rapport_modele_cr_global;
    }

    public function getRapportModeleConvoc() : ?string
    {
        return $this->rapport_modele_convoc;
    }

    public function setRapportModeleConvoc(string $rapport_modele_convoc = null) : void
    {
        $this->rapport_modele_convoc=$rapport_modele_convoc;
    }
}
