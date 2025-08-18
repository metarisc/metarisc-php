<?php

namespace Metarisc\Model;

/*
 * Dossier de base.
*/

class DossierBase extends ModelAbstract
{
    private ?string $id                                               = null;
    private ?string $objet                                            = null;
    private ?string $date_de_creation                                 = null;
    private ?\Metarisc\Model\Utilisateur $createur                    = null;
    private ?string $application_utilisee_nom                         = null;
    private ?string $statut                                           = null;
    private ?array $modules                                           = null;
    private ?array $tags                                              = null;
    private ?bool $est_archive                                        = null;
    private ?\Metarisc\Model\PassageCommission $passage_en_commission = null;
    private ?string $avis                                             = null;
    private ?\Metarisc\Model\Enveloppe $enveloppe                     = null;
    private ?array $workflows_actifs                                  = null;
    private ?int $nb_messages_fil_rouge                               = null;
    private ?int $nb_contacts                                         = null;
    private ?int $nb_pieces_jointes                                   = null;
    private ?array $affectations                                      = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

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

        /** @var string[] $data['modules'] */
        $object->setModules($data['modules']);

        /** @var \Metarisc\Model\Tag[] $data['tags'] */
        $object->setTags($data['tags']);

        /** @var bool $data['est_archive'] */
        $object->setEstArchive($data['est_archive']);

        /** @var array<array-key, mixed> $data['passage_en_commission'] */
        $object->setPassageEnCommission($data['passage_en_commission']);

        /** @var string $data['avis'] */
        $object->setAvis($data['avis']);

        /** @var array<array-key, mixed> $data['enveloppe'] */
        $object->setEnveloppe($data['enveloppe']);

        /** @var string[] $data['workflows_actifs'] */
        $object->setWorkflowsActifs($data['workflows_actifs']);

        /** @var int $data['nb_messages_fil_rouge'] */
        $object->setNbMessagesFilRouge($data['nb_messages_fil_rouge']);

        /** @var int $data['nb_contacts'] */
        $object->setNbContacts($data['nb_contacts']);

        /** @var int $data['nb_pieces_jointes'] */
        $object->setNbPiecesJointes($data['nb_pieces_jointes']);

        /** @var \Metarisc\Model\DossierAffectation[] $data['affectations'] */
        $object->setAffectations($data['affectations']);

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

    public function getModules() : ?array
    {
        return $this->modules;
    }

    public function setModules(array $modules = null) : void
    {
        $this->modules=$modules;
    }

    public function getTags() : ?array
    {
        return $this->tags;
    }

    public function setTags(array $tags = null) : void
    {
        $this->tags=$tags;
    }

    public function getEstArchive() : ?bool
    {
        return $this->est_archive;
    }

    public function setEstArchive(bool $est_archive = null) : void
    {
        $this->est_archive=$est_archive;
    }

    public function getPassageEnCommission() : ?PassageCommission
    {
        return $this->passage_en_commission;
    }

    public function setPassageEnCommission(array $passage_en_commission) : void
    {
        $this->passage_en_commission=PassageCommission::unserialize($passage_en_commission);
    }

    public function getAvis() : ?string
    {
        return $this->avis;
    }

    public function setAvis(string $avis = null) : void
    {
        $this->avis=$avis;
    }

    public function getEnveloppe() : ?Enveloppe
    {
        return $this->enveloppe;
    }

    public function setEnveloppe(array $enveloppe) : void
    {
        $this->enveloppe=Enveloppe::unserialize($enveloppe);
    }

    public function getWorkflowsActifs() : ?array
    {
        return $this->workflows_actifs;
    }

    public function setWorkflowsActifs(array $workflows_actifs = null) : void
    {
        $this->workflows_actifs=$workflows_actifs;
    }

    public function getNbMessagesFilRouge() : ?int
    {
        return $this->nb_messages_fil_rouge;
    }

    public function setNbMessagesFilRouge(int $nb_messages_fil_rouge = null) : void
    {
        $this->nb_messages_fil_rouge=$nb_messages_fil_rouge;
    }

    public function getNbContacts() : ?int
    {
        return $this->nb_contacts;
    }

    public function setNbContacts(int $nb_contacts = null) : void
    {
        $this->nb_contacts=$nb_contacts;
    }

    public function getNbPiecesJointes() : ?int
    {
        return $this->nb_pieces_jointes;
    }

    public function setNbPiecesJointes(int $nb_pieces_jointes = null) : void
    {
        $this->nb_pieces_jointes=$nb_pieces_jointes;
    }

    public function getAffectations() : ?array
    {
        return $this->affectations;
    }

    public function setAffectations(array $affectations = null) : void
    {
        $this->affectations=$affectations;
    }
}
