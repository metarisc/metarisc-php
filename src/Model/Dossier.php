<?php

namespace Metarisc\Model;

/*
 * Les dossiers sont un ensemble de documents administratifs et techniques. L'instruction du dossier suit une logique pré-définie selon le type.
*/

class Dossier extends ModelAbstract
{
    private ?string $id                            = null;
    private ?string $type                          = null;
    private ?string $objet                         = null;
    private ?string $date_de_creation              = null;
    private ?\Metarisc\Model\Utilisateur $createur = null;
    private ?string $application_utilisee_nom      = null;
    private ?string $statut                        = null;
    private ?\Metarisc\Model\PEI $pei              = null;
    private ?\Metarisc\Model\ERP $erp              = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var string $data['objet'] */
        $object->setObjet($data['objet']);

        /** @var string $data['date_de_creation'] */
        $object->setDateDeCreation($data['date_de_creation']);

        /** @var array<array-key, mixed> $data['createur'] */
        $object->setCreateur($data['createur']);

        /** @var string $data['application_utilisee_nom'] */
        $object->setApplicationUtiliseeNom($data['application_utilisee_nom']);

        /** @var string $data['statut'] */
        $object->setStatut($data['statut']);

        /** @var array<array-key, mixed> $data['pei'] */
        $object->setPei($data['pei']);

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

    public function getPei() : ?PEI
    {
        return $this->pei;
    }

    public function setPei(array $pei) : void
    {
        $this->pei=PEI::unserialize($pei);
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
