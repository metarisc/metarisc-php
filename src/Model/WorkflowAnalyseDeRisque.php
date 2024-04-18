<?php

namespace Metarisc\Model;

class WorkflowAnalyseDeRisque extends WorkflowBase
{
    private ?string $analyse_de_risque             = null;
    private ?\Metarisc\Model\Avis $avis_rapporteur = null;
    private ?string $descriptif_effectifs          = null;
    private ?int $facteur_dangerosite              = null;
    private ?string $derogations                   = null;
    private ?array $prescriptions                  = null;

    private ?string $mesures_compensatoires  = null;
    private ?string $mesures_complementaires = null;

    public function getAnalyseDeRisque() : ?string
    {
        return $this->analyse_de_risque;
    }

    public function setAnalyseDeRisque(string $analyse_de_risque) : void
    {
        $this->analyse_de_risque=$analyse_de_risque;
    }

    public function getAvisRapporteur() : ?Avis
    {
        return $this->avis_rapporteur;
    }

    public function setAvisRapporteur(Avis $avis_rapporteur) : void
    {
        $this->avis_rapporteur=$avis_rapporteur;
    }

    public function getDescriptifEffectifs() : ?string
    {
        return $this->descriptif_effectifs;
    }

    public function setDescriptifEffectifs(string $descriptif_effectifs) : void
    {
        $this->descriptif_effectifs=$descriptif_effectifs;
    }

    public function getFacteurDangerosite() : ?int
    {
        return $this->facteur_dangerosite;
    }

    public function setFacteurDangerosite(int $facteur_dangerosite) : void
    {
        $this->facteur_dangerosite=$facteur_dangerosite;
    }

    public function getDerogations() : ?string
    {
        return $this->derogations;
    }

    public function setDerogations(string $derogations) : void
    {
        $this->derogations=$derogations;
    }

    public function getPrescriptions() : ?array
    {
        return $this->prescriptions;
    }

    public function setPrescriptions(array $prescriptions) : void
    {
        $this->prescriptions=$prescriptions;
    }

    public function getMesuresCompensatoires() : ?string
    {
        return $this->mesures_compensatoires;
    }

    public function setMesuresCompensatoires(string $mesures_compensatoires) : void
    {
        $this->mesures_compensatoires=$mesures_compensatoires;
    }

    public function getMesuresComplementaires() : ?string
    {
        return $this->mesures_complementaires;
    }

    public function setMesuresComplementaires(string $mesures_complementaires) : void
    {
        $this->mesures_complementaires=$mesures_complementaires;
    }
}
