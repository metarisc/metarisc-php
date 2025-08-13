<?php

namespace Metarisc\Model;

/*
 * Texte réglementaire destiné à assurer la sécurité contre les risques d'incendie  et de panique dans les établissements recevant du public.
*/

class ObjetSupportRGlementaire extends ModelAbstract
{
    private ?string $nature         = null;
    private ?string $legifrance_cid = null;
    private ?string $contenu        = null;
    private ?string $titre          = null;
    private ?string $etat           = null;
    private ?string $reference      = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['nature'] */
        $object->setNature($data['nature']);

        /** @var string $data['legifrance_cid'] */
        $object->setLegifranceCid($data['legifrance_cid']);

        /** @var string $data['contenu'] */
        $object->setContenu($data['contenu']);

        /** @var string $data['titre'] */
        $object->setTitre($data['titre']);

        /** @var string $data['etat'] */
        $object->setEtat($data['etat']);

        /** @var string $data['reference'] */
        $object->setReference($data['reference']);

        return $object;
    }

    public function getNature() : ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature = null) : void
    {
        $this->nature=$nature;
    }

    public function getLegifranceCid() : ?string
    {
        return $this->legifrance_cid;
    }

    public function setLegifranceCid(string $legifrance_cid = null) : void
    {
        $this->legifrance_cid=$legifrance_cid;
    }

    public function getContenu() : ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu = null) : void
    {
        $this->contenu=$contenu;
    }

    public function getTitre() : ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre = null) : void
    {
        $this->titre=$titre;
    }

    public function getEtat() : ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat = null) : void
    {
        $this->etat=$etat;
    }

    public function getReference() : ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference = null) : void
    {
        $this->reference=$reference;
    }
}
