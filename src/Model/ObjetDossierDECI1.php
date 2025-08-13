<?php

namespace Metarisc\Model;

/*
 * Dossier d'un DECI.
*/

class ObjetDossierDECI1 extends ModelAbstract
{
    private ?string $objet            = null;
    private ?string $date_de_creation = null;
    private ?string $enveloppe_id     = null;
    private ?string $type             = null;

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
}
