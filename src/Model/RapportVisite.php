<?php

namespace Metarisc\Model;

/*
 * Gestion de l'analyse de risque.
*/

class RapportVisite extends ModelAbstract
{
    private ?string $observations                  = null;
    private ?string $prise_de_note_interne         = null;
    private ?string $proposition_avis              = null;
    private ?string $proposition_avis_observations = null;
    private ?int $facteur_dangerosite              = null;
    private ?array $documents_techniques           = null;
    private ?array $essais                         = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['observations'] */
        $object->setObservations($data['observations']);

        /** @var string $data['prise_de_note_interne'] */
        $object->setPriseDeNoteInterne($data['prise_de_note_interne']);

        /** @var string $data['proposition_avis'] */
        $object->setPropositionAvis($data['proposition_avis']);

        /** @var string $data['proposition_avis_observations'] */
        $object->setPropositionAvisObservations($data['proposition_avis_observations']);

        /** @var int $data['facteur_dangerosite'] */
        $object->setFacteurDangerosite($data['facteur_dangerosite']);

        /** @var \Metarisc\Model\DocumentTechnique[] $data['documents_techniques'] */
        $object->setDocumentsTechniques($data['documents_techniques']);

        /** @var \Metarisc\Model\Essai[] $data['essais'] */
        $object->setEssais($data['essais']);

        return $object;
    }

    public function getObservations() : ?string
    {
        return $this->observations;
    }

    public function setObservations(string $observations = null) : void
    {
        $this->observations=$observations;
    }

    public function getPriseDeNoteInterne() : ?string
    {
        return $this->prise_de_note_interne;
    }

    public function setPriseDeNoteInterne(string $prise_de_note_interne = null) : void
    {
        $this->prise_de_note_interne=$prise_de_note_interne;
    }

    public function getPropositionAvis() : ?string
    {
        return $this->proposition_avis;
    }

    public function setPropositionAvis(string $proposition_avis = null) : void
    {
        $this->proposition_avis=$proposition_avis;
    }

    public function getPropositionAvisObservations() : ?string
    {
        return $this->proposition_avis_observations;
    }

    public function setPropositionAvisObservations(string $proposition_avis_observations = null) : void
    {
        $this->proposition_avis_observations=$proposition_avis_observations;
    }

    public function getFacteurDangerosite() : ?int
    {
        return $this->facteur_dangerosite;
    }

    public function setFacteurDangerosite(int $facteur_dangerosite = null) : void
    {
        $this->facteur_dangerosite=$facteur_dangerosite;
    }

    public function getDocumentsTechniques() : ?array
    {
        return $this->documents_techniques;
    }

    public function setDocumentsTechniques(array $documents_techniques = null) : void
    {
        $this->documents_techniques=$documents_techniques;
    }

    public function getEssais() : ?array
    {
        return $this->essais;
    }

    public function setEssais(array $essais = null) : void
    {
        $this->essais=$essais;
    }
}
