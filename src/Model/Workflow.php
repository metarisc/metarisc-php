<?php

namespace Metarisc\Model;

class Workflow extends ModelAbstract
{
    private ?string $id                                            = null;
    private ?string $titre                                         = null;
    private ?string $date_de_creation                              = null;
    private ?string $date_de_debut                                 = null;
    private ?string $date_de_fin                                   = null;
    private ?bool $workflow_automatise                             = null;
    private ?string $etat                                          = null;
    private ?string $observations                                  = null;
    private ?string $type                                          = null;
    private ?array $dossier_lie                                    = null;
    private ?string $pei_lie                                       = null;
    private ?array $anomalies_levees                               = null;
    private ?\Metarisc\Model\PassageCommission $commission_date    = null;
    private ?\Metarisc\Model\Avis $avis_de_commission              = null;
    private ?string $analyse_de_risque                             = null;
    private ?\Metarisc\Model\Avis $avis_rapporteur                 = null;
    private ?string $descriptif_effectifs                          = null;
    private ?int $facteur_dangerosite                              = null;
    private ?string $derogations                                   = null;
    private ?array $prescriptions                                  = null;
    private ?string $mesures_compensatoires                        = null;
    private ?string $mesures_complementaires                       = null;
    private ?string $date_arrivee_secretariat                      = null;
    private ?\Metarisc\Model\PassageCommission $passage_commission = null;
    private ?\Metarisc\Model\Commission $commission                = null;
    private ?bool $est_valide                                      = null;
    private ?bool $est_relu                                        = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['titre'] */
        $object->setTitre($data['titre']);

        /** @var string $data['date_de_creation'] */
        $object->setDateDeCreation($data['date_de_creation']);

        /** @var string $data['date_de_debut'] */
        $object->setDateDeDebut($data['date_de_debut']);

        /** @var string $data['date_de_fin'] */
        $object->setDateDeFin($data['date_de_fin']);

        /** @var bool $data['workflow_automatise'] */
        $object->setWorkflowAutomatise($data['workflow_automatise']);

        /** @var string $data['etat'] */
        $object->setEtat($data['etat']);

        /** @var string $data['observations'] */
        $object->setObservations($data['observations']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var \Metarisc\Model\Dossier[] $data['dossier_lie'] */
        $object->setDossierLie($data['dossier_lie']);

        /** @var string $data['pei_lie'] */
        $object->setPeiLie($data['pei_lie']);

        /** @var string[] $data['anomalies_levees'] */
        $object->setAnomaliesLevees($data['anomalies_levees']);

        /** @var array<array-key, mixed> $data['commission_date'] */
        $object->setCommissionDate($data['commission_date']);

        /** @var array<array-key, mixed> $data['avis_de_commission'] */
        $object->setAvisDeCommission($data['avis_de_commission']);

        /** @var string $data['analyse_de_risque'] */
        $object->setAnalyseDeRisque($data['analyse_de_risque']);

        /** @var array<array-key, mixed> $data['avis_rapporteur'] */
        $object->setAvisRapporteur($data['avis_rapporteur']);

        /** @var string $data['descriptif_effectifs'] */
        $object->setDescriptifEffectifs($data['descriptif_effectifs']);

        /** @var int $data['facteur_dangerosite'] */
        $object->setFacteurDangerosite($data['facteur_dangerosite']);

        /** @var string $data['derogations'] */
        $object->setDerogations($data['derogations']);

        /** @var \Metarisc\Model\Prescription[] $data['prescriptions'] */
        $object->setPrescriptions($data['prescriptions']);

        /** @var string $data['mesures_compensatoires'] */
        $object->setMesuresCompensatoires($data['mesures_compensatoires']);

        /** @var string $data['mesures_complementaires'] */
        $object->setMesuresComplementaires($data['mesures_complementaires']);

        /** @var string $data['date_arrivee_secretariat'] */
        $object->setDateArriveeSecretariat($data['date_arrivee_secretariat']);

        /** @var array<array-key, mixed> $data['passage_commission'] */
        $object->setPassageCommission($data['passage_commission']);

        /** @var array<array-key, mixed> $data['commission'] */
        $object->setCommission($data['commission']);

        /** @var bool $data['est_valide'] */
        $object->setEstValide($data['est_valide']);

        /** @var bool $data['est_relu'] */
        $object->setEstRelu($data['est_relu']);

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

    public function getTitre() : ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre = null) : void
    {
        $this->titre=$titre;
    }

    public function getDateDeCreation() : ?string
    {
        return $this->date_de_creation;
    }

    public function setDateDeCreation(?string $date_de_creation) : void
    {
        $this->date_de_creation = $date_de_creation;
    }

    public function getDateDeDebut() : ?string
    {
        return $this->date_de_debut;
    }

    public function setDateDeDebut(?string $date_de_debut) : void
    {
        $this->date_de_debut = $date_de_debut;
    }

    public function getDateDeFin() : ?string
    {
        return $this->date_de_fin;
    }

    public function setDateDeFin(?string $date_de_fin) : void
    {
        $this->date_de_fin = $date_de_fin;
    }

    public function getWorkflowAutomatise() : ?bool
    {
        return $this->workflow_automatise;
    }

    public function setWorkflowAutomatise(bool $workflow_automatise = null) : void
    {
        $this->workflow_automatise=$workflow_automatise;
    }

    public function getEtat() : ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat = null) : void
    {
        $this->etat=$etat;
    }

    public function getObservations() : ?string
    {
        return $this->observations;
    }

    public function setObservations(string $observations = null) : void
    {
        $this->observations=$observations;
    }

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
    }

    public function getDossierLie() : ?array
    {
        return $this->dossier_lie;
    }

    public function setDossierLie(array $dossier_lie = null) : void
    {
        $this->dossier_lie=$dossier_lie;
    }

    public function getPeiLie() : ?string
    {
        return $this->pei_lie;
    }

    public function setPeiLie(string $pei_lie = null) : void
    {
        $this->pei_lie=$pei_lie;
    }

    public function getAnomaliesLevees() : ?array
    {
        return $this->anomalies_levees;
    }

    public function setAnomaliesLevees(array $anomalies_levees = null) : void
    {
        $this->anomalies_levees=$anomalies_levees;
    }

    public function getCommissionDate() : ?PassageCommission
    {
        return $this->commission_date;
    }

    public function setCommissionDate(array $commission_date) : void
    {
        $this->commission_date=PassageCommission::unserialize($commission_date);
    }

    public function getAvisDeCommission() : ?Avis
    {
        return $this->avis_de_commission;
    }

    public function setAvisDeCommission(array $avis_de_commission) : void
    {
        $this->avis_de_commission=Avis::unserialize($avis_de_commission);
    }

    public function getAnalyseDeRisque() : ?string
    {
        return $this->analyse_de_risque;
    }

    public function setAnalyseDeRisque(string $analyse_de_risque = null) : void
    {
        $this->analyse_de_risque=$analyse_de_risque;
    }

    public function getAvisRapporteur() : ?Avis
    {
        return $this->avis_rapporteur;
    }

    public function setAvisRapporteur(array $avis_rapporteur) : void
    {
        $this->avis_rapporteur=Avis::unserialize($avis_rapporteur);
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

    public function getDateArriveeSecretariat() : ?string
    {
        return $this->date_arrivee_secretariat;
    }

    public function setDateArriveeSecretariat(?string $date_arrivee_secretariat) : void
    {
        $this->date_arrivee_secretariat = $date_arrivee_secretariat;
    }

    public function getPassageCommission() : ?PassageCommission
    {
        return $this->passage_commission;
    }

    public function setPassageCommission(array $passage_commission) : void
    {
        $this->passage_commission=PassageCommission::unserialize($passage_commission);
    }

    public function getCommission() : ?Commission
    {
        return $this->commission;
    }

    public function setCommission(array $commission) : void
    {
        $this->commission=Commission::unserialize($commission);
    }

    public function getEstValide() : ?bool
    {
        return $this->est_valide;
    }

    public function setEstValide(bool $est_valide = null) : void
    {
        $this->est_valide=$est_valide;
    }

    public function getEstRelu() : ?bool
    {
        return $this->est_relu;
    }

    public function setEstRelu(bool $est_relu = null) : void
    {
        $this->est_relu=$est_relu;
    }
}
