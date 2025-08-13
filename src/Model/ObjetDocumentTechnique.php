<?php

namespace Metarisc\Model;

/*
 * Un dossier permettant de vérifier la conformité d'un établissement recevant le public avec les règles de sécurité, prévu par le b de l'article R. 122-11, comprend des documents techniques. Voir https://www.legifrance.gouv.fr/codes/article_lc/LEGIARTI000043818985.
*/

class ObjetDocumentTechnique extends ModelAbstract
{
    private ?string $libelle                 = null;
    private ?string $reference               = null;
    private ?string $type                    = null;
    private ?\DateTime $date_de_reception    = null;
    private ?\DateTime $date_de_consultation = null;
    private ?bool $est_manquant              = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['libelle'] */
        $object->setLibelle($data['libelle']);

        /** @var string $data['reference'] */
        $object->setReference($data['reference']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var \DateTime $data['date_de_reception'] */
        $object->setDateDeReception($data['date_de_reception']);

        /** @var \DateTime $data['date_de_consultation'] */
        $object->setDateDeConsultation($data['date_de_consultation']);

        /** @var bool $data['est_manquant'] */
        $object->setEstManquant($data['est_manquant']);

        return $object;
    }

    public function getLibelle() : ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle = null) : void
    {
        $this->libelle=$libelle;
    }

    public function getReference() : ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference = null) : void
    {
        $this->reference=$reference;
    }

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
    }

    public function getDateDeReception() : ?\DateTime
    {
        return $this->date_de_reception;
    }

    public function setDateDeReception(\DateTime $date_de_reception = null) : void
    {
        $this->date_de_reception=$date_de_reception;
    }

    public function getDateDeConsultation() : ?\DateTime
    {
        return $this->date_de_consultation;
    }

    public function setDateDeConsultation(\DateTime $date_de_consultation = null) : void
    {
        $this->date_de_consultation=$date_de_consultation;
    }

    public function getEstManquant() : ?bool
    {
        return $this->est_manquant;
    }

    public function setEstManquant(bool $est_manquant = null) : void
    {
        $this->est_manquant=$est_manquant;
    }
}
