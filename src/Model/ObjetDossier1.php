<?php

namespace Metarisc\Model;

/*
 * Les dossiers sont un ensemble de documents administratifs et techniques. L'instruction du dossier suit une logique pré-définie selon le type.
*/

class ObjetDossier1 extends ModelAbstract
{
    private ?string $objet                     = null;
    private ?string $date_de_creation          = null;
    private ?string $enveloppe_id              = null;
    private ?string $type                      = null;
    private ?string $numero_urbanisme          = null;
    private ?\DateTime $numero_urbanisme_date  = null;
    private ?string $demandeur                 = null;
    private ?string $service_instructeur       = null;
    private ?string $descriptif_travaux        = null;
    private ?\DateTime $date_limite_traitement = null;
    private ?bool $dossier_complet             = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['objet'] */
        $object->setObjet($data['objet']);

        /** @var string $data['date_de_creation'] */
        $object->setDateDeCreation($data['date_de_creation']);

        /** @var string $data['enveloppe_id'] */
        $object->setEnveloppeId($data['enveloppe_id']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var string $data['numero_urbanisme'] */
        $object->setNumeroUrbanisme($data['numero_urbanisme']);

        /** @var \DateTime $data['numero_urbanisme_date'] */
        $object->setNumeroUrbanismeDate($data['numero_urbanisme_date']);

        /** @var string $data['demandeur'] */
        $object->setDemandeur($data['demandeur']);

        /** @var string $data['service_instructeur'] */
        $object->setServiceInstructeur($data['service_instructeur']);

        /** @var string $data['descriptif_travaux'] */
        $object->setDescriptifTravaux($data['descriptif_travaux']);

        /** @var \DateTime $data['date_limite_traitement'] */
        $object->setDateLimiteTraitement($data['date_limite_traitement']);

        /** @var bool $data['dossier_complet'] */
        $object->setDossierComplet($data['dossier_complet']);

        return $object;
    }

    public function getObjet() : ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet = null) : void
    {
        $this->objet=$objet;
    }

    public function getDateDeCreation() : ?string
    {
        return $this->date_de_creation;
    }

    public function setDateDeCreation(?string $date_de_creation) : void
    {
        $this->date_de_creation = $date_de_creation;
    }

    public function getEnveloppeId() : ?string
    {
        return $this->enveloppe_id;
    }

    public function setEnveloppeId(string $enveloppe_id = null) : void
    {
        $this->enveloppe_id=$enveloppe_id;
    }

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
    }

    public function getNumeroUrbanisme() : ?string
    {
        return $this->numero_urbanisme;
    }

    public function setNumeroUrbanisme(string $numero_urbanisme = null) : void
    {
        $this->numero_urbanisme=$numero_urbanisme;
    }

    public function getNumeroUrbanismeDate() : ?\DateTime
    {
        return $this->numero_urbanisme_date;
    }

    public function setNumeroUrbanismeDate(\DateTime $numero_urbanisme_date = null) : void
    {
        $this->numero_urbanisme_date=$numero_urbanisme_date;
    }

    public function getDemandeur() : ?string
    {
        return $this->demandeur;
    }

    public function setDemandeur(string $demandeur = null) : void
    {
        $this->demandeur=$demandeur;
    }

    public function getServiceInstructeur() : ?string
    {
        return $this->service_instructeur;
    }

    public function setServiceInstructeur(string $service_instructeur = null) : void
    {
        $this->service_instructeur=$service_instructeur;
    }

    public function getDescriptifTravaux() : ?string
    {
        return $this->descriptif_travaux;
    }

    public function setDescriptifTravaux(string $descriptif_travaux = null) : void
    {
        $this->descriptif_travaux=$descriptif_travaux;
    }

    public function getDateLimiteTraitement() : ?\DateTime
    {
        return $this->date_limite_traitement;
    }

    public function setDateLimiteTraitement(\DateTime $date_limite_traitement = null) : void
    {
        $this->date_limite_traitement=$date_limite_traitement;
    }

    public function getDossierComplet() : ?bool
    {
        return $this->dossier_complet;
    }

    public function setDossierComplet(bool $dossier_complet = null) : void
    {
        $this->dossier_complet=$dossier_complet;
    }
}
