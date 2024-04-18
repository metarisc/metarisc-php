<?php

namespace Metarisc\Model;

class UpdateDossierWorkflowsDetailsRequest extends ModelAbstract
{
    private ?bool $est_valide                 = null;
    private ?string $passage_commission_id    = null;
    private ?bool $avis_favorable             = null;
    private ?string $commission_id            = null;
    private ?string $date_arrivee_secretariat = null;
    private ?string $analyse_de_risque        = null;
    private ?bool $avis_rapporteur            = null;
    private ?string $descriptif_effectifs     = null;
    private ?int $facteur_dangerosite         = null;
    private ?string $derogations              = null;
    private ?array $prescriptions             = null;
    private ?string $mesures_compensatoires   = null;
    private ?string $mesures_complementaires  = null;
    private ?string $observations             = null;
    private ?bool $termine                    = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var bool $data['est_valide'] */
        $object->setEstValide($data['est_valide']);

        /** @var string $data['passage_commission_id'] */
        $object->setPassageCommissionId($data['passage_commission_id']);

        /** @var bool $data['avis_favorable'] */
        $object->setAvisFavorable($data['avis_favorable']);

        /** @var string $data['commission_id'] */
        $object->setCommissionId($data['commission_id']);

        /** @var string $data['date_arrivee_secretariat'] */
        $object->setDateArriveeSecretariat($data['date_arrivee_secretariat']);

        /** @var string $data['analyse_de_risque'] */
        $object->setAnalyseDeRisque($data['analyse_de_risque']);

        /** @var bool $data['avis_rapporteur'] */
        $object->setAvisRapporteur($data['avis_rapporteur']);

        /** @var string $data['descriptif_effectifs'] */
        $object->setDescriptifEffectifs($data['descriptif_effectifs']);

        /** @var int $data['facteur_dangerosite'] */
        $object->setFacteurDangerosite($data['facteur_dangerosite']);

        /** @var string $data['derogations'] */
        $object->setDerogations($data['derogations']);

        /** @var string[] $data['prescriptions'] */
        $object->setPrescriptions($data['prescriptions']);

        /** @var string $data['mesures_compensatoires'] */
        $object->setMesuresCompensatoires($data['mesures_compensatoires']);

        /** @var string $data['mesures_complementaires'] */
        $object->setMesuresComplementaires($data['mesures_complementaires']);

        /** @var string $data['observations'] */
        $object->setObservations($data['observations']);

        /** @var bool $data['termine'] */
        $object->setTermine($data['termine']);

        return $object;
    }

    public function getEstValide() : ?bool
    {
        return $this->est_valide;
    }

    public function setEstValide(bool $est_valide = null) : void
    {
        $this->est_valide=$est_valide;
    }

    public function getPassageCommissionId() : ?string
    {
        return $this->passage_commission_id;
    }

    public function setPassageCommissionId(string $passage_commission_id = null) : void
    {
        $this->passage_commission_id=$passage_commission_id;
    }

    public function getAvisFavorable() : ?bool
    {
        return $this->avis_favorable;
    }

    public function setAvisFavorable(bool $avis_favorable = null) : void
    {
        $this->avis_favorable=$avis_favorable;
    }

    public function getCommissionId() : ?string
    {
        return $this->commission_id;
    }

    public function setCommissionId(string $commission_id = null) : void
    {
        $this->commission_id=$commission_id;
    }

    public function getDateArriveeSecretariat() : ?string
    {
        return $this->date_arrivee_secretariat;
    }

    public function setDateArriveeSecretariat(?string $date_arrivee_secretariat) : void
    {
        $this->date_arrivee_secretariat = $date_arrivee_secretariat;
    }

    public function getAnalyseDeRisque() : ?string
    {
        return $this->analyse_de_risque;
    }

    public function setAnalyseDeRisque(string $analyse_de_risque = null) : void
    {
        $this->analyse_de_risque=$analyse_de_risque;
    }

    public function getAvisRapporteur() : ?bool
    {
        return $this->avis_rapporteur;
    }

    public function setAvisRapporteur(bool $avis_rapporteur = null) : void
    {
        $this->avis_rapporteur=$avis_rapporteur;
    }

    public function getDescriptifEffectifs() : ?string
    {
        return $this->descriptif_effectifs;
    }

    public function setDescriptifEffectifs(string $descriptif_effectifs = null) : void
    {
        $this->descriptif_effectifs=$descriptif_effectifs;
    }

    public function getFacteurDangerosite() : ?int
    {
        return $this->facteur_dangerosite;
    }

    public function setFacteurDangerosite(int $facteur_dangerosite = null) : void
    {
        $this->facteur_dangerosite=$facteur_dangerosite;
    }

    public function getDerogations() : ?string
    {
        return $this->derogations;
    }

    public function setDerogations(string $derogations = null) : void
    {
        $this->derogations=$derogations;
    }

    public function getPrescriptions() : ?array
    {
        return $this->prescriptions;
    }

    public function setPrescriptions(array $prescriptions = null) : void
    {
        $this->prescriptions=$prescriptions;
    }

    public function getMesuresCompensatoires() : ?string
    {
        return $this->mesures_compensatoires;
    }

    public function setMesuresCompensatoires(string $mesures_compensatoires = null) : void
    {
        $this->mesures_compensatoires=$mesures_compensatoires;
    }

    public function getMesuresComplementaires() : ?string
    {
        return $this->mesures_complementaires;
    }

    public function setMesuresComplementaires(string $mesures_complementaires = null) : void
    {
        $this->mesures_complementaires=$mesures_complementaires;
    }

    public function getObservations() : ?string
    {
        return $this->observations;
    }

    public function setObservations(string $observations = null) : void
    {
        $this->observations=$observations;
    }

    public function getTermine() : ?bool
    {
        return $this->termine;
    }

    public function setTermine(bool $termine = null) : void
    {
        $this->termine=$termine;
    }
}
