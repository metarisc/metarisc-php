<?php

namespace Metarisc\Model;

/*
 * Descriptif technique actuel du PEI.
*/

class ObjetPointDEauIncendieDescriptifTechnique extends ModelAbstract
{
    private ?string $type                   = null;
    private ?string $domanialite            = null;
    private ?string $observations_generales = null;
    private ?string $statut                 = null;
    private ?float $surpression             = null;
    private ?string $nature                 = null;
    private ?float $debit_1bar              = null;
    private ?float $pression                = null;
    private ?float $pression_statique       = null;
    private ?float $debit_gueule_bee        = null;
    private ?float $volume                  = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var string $data['domanialite'] */
        $object->setDomanialite($data['domanialite']);

        /** @var string $data['observations_generales'] */
        $object->setObservationsGenerales($data['observations_generales']);

        /** @var string $data['statut'] */
        $object->setStatut($data['statut']);

        /** @var float $data['surpression'] */
        $object->setSurpression($data['surpression']);

        /** @var string $data['nature'] */
        $object->setNature($data['nature']);

        /** @var float $data['debit_1bar'] */
        $object->setDebit1bar($data['debit_1bar']);

        /** @var float $data['pression'] */
        $object->setPression($data['pression']);

        /** @var float $data['pression_statique'] */
        $object->setPressionStatique($data['pression_statique']);

        /** @var float $data['debit_gueule_bee'] */
        $object->setDebitGueuleBee($data['debit_gueule_bee']);

        /** @var float $data['volume'] */
        $object->setVolume($data['volume']);

        return $object;
    }

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
    }

    public function getDomanialite() : ?string
    {
        return $this->domanialite;
    }

    public function setDomanialite(string $domanialite = null) : void
    {
        $this->domanialite=$domanialite;
    }

    public function getObservationsGenerales() : ?string
    {
        return $this->observations_generales;
    }

    public function setObservationsGenerales(string $observations_generales = null) : void
    {
        $this->observations_generales=$observations_generales;
    }

    public function getStatut() : ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut = null) : void
    {
        $this->statut=$statut;
    }

    public function getSurpression() : ?float
    {
        return $this->surpression;
    }

    public function setSurpression(float $surpression = null) : void
    {
        $this->surpression=$surpression;
    }

    public function getNature() : ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature = null) : void
    {
        $this->nature=$nature;
    }

    public function getDebit1bar() : ?float
    {
        return $this->debit_1bar;
    }

    public function setDebit1bar(float $debit_1bar = null) : void
    {
        $this->debit_1bar=$debit_1bar;
    }

    public function getPression() : ?float
    {
        return $this->pression;
    }

    public function setPression(float $pression = null) : void
    {
        $this->pression=$pression;
    }

    public function getPressionStatique() : ?float
    {
        return $this->pression_statique;
    }

    public function setPressionStatique(float $pression_statique = null) : void
    {
        $this->pression_statique=$pression_statique;
    }

    public function getDebitGueuleBee() : ?float
    {
        return $this->debit_gueule_bee;
    }

    public function setDebitGueuleBee(float $debit_gueule_bee = null) : void
    {
        $this->debit_gueule_bee=$debit_gueule_bee;
    }

    public function getVolume() : ?float
    {
        return $this->volume;
    }

    public function setVolume(float $volume = null) : void
    {
        $this->volume=$volume;
    }
}
