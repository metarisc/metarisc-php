<?php

namespace Metarisc\Model;

class Dossier extends ModelAbstract
{
    private ?string $id                            = null;
    private ?string $type                          = null;
    private ?string $description                   = null;
    private ?string $date_de_creation              = null;
    private ?\Metarisc\Model\Utilisateur $createur = null;
    private ?string $application_utilisee_nom      = null;
    private ?string $statut                        = null;
    private ?string $objet                         = null;
    private ?string $pei_id                        = null;
    private ?\Metarisc\Model\PEI $pei              = null;
    private ?string $erp_id                        = null;
    private ?\Metarisc\Model\ERP $erp              = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var string $data['description'] */
        $object->setDescription($data['description']);

        /** @var string $data['date_de_creation'] */
        $object->setDateDeCreation($data['date_de_creation']);

        /** @var array<array-key, mixed> $data['createur'] */
        $object->setCreateur($data['createur']);

        /** @var string $data['application_utilisee_nom'] */
        $object->setApplicationUtiliseeNom($data['application_utilisee_nom']);

        /** @var string $data['statut'] */
        $object->setStatut($data['statut']);

        /** @var string $data['objet'] */
        $object->setObjet($data['objet']);

        /** @var string $data['pei_id'] */
        $object->setPeiId($data['pei_id']);

        /** @var array<array-key, mixed> $data['pei'] */
        $object->setPei($data['pei']);

        /** @var string $data['erp_id'] */
        $object->setErpId($data['erp_id']);

        /** @var array<array-key, mixed> $data['erp'] */
        $object->setErp($data['erp']);

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

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
    }

    public function getDescription() : ?string
    {
        return $this->description;
    }

    public function setDescription(string $description = null) : void
    {
        $this->description=$description;
    }

    public function getDateDeCreation() : ?string
    {
        return $this->date_de_creation;
    }

    public function setDateDeCreation(?string $date_de_creation) : void
    {
        $this->date_de_creation = $date_de_creation;
    }

    public function getCreateur() : ?Utilisateur
    {
        return $this->createur;
    }

    public function setCreateur(array $createur) : void
    {
        $this->createur=Utilisateur::unserialize($createur);
    }

    public function getApplicationUtiliseeNom() : ?string
    {
        return $this->application_utilisee_nom;
    }

    public function setApplicationUtiliseeNom(string $application_utilisee_nom = null) : void
    {
        $this->application_utilisee_nom=$application_utilisee_nom;
    }

    public function getStatut() : ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut = null) : void
    {
        $this->statut=$statut;
    }

    public function getObjet() : ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet = null) : void
    {
        $this->objet=$objet;
    }

    public function getPeiId() : ?string
    {
        return $this->pei_id;
    }

    public function setPeiId(string $pei_id = null) : void
    {
        $this->pei_id=$pei_id;
    }

    public function getPei() : ?PEI
    {
        return $this->pei;
    }

    public function setPei(array $pei) : void
    {
        $this->pei=PEI::unserialize($pei);
    }

    public function getErpId() : ?string
    {
        return $this->erp_id;
    }

    public function setErpId(string $erp_id = null) : void
    {
        $this->erp_id=$erp_id;
    }

    public function getErp() : ?ERP
    {
        return $this->erp;
    }

    public function setErp(array $erp) : void
    {
        $this->erp=ERP::unserialize($erp);
    }
}
