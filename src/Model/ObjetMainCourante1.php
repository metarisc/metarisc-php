<?php

namespace Metarisc\Model;

/*
 * Main courante. Elle représente une liste d'événements enregistrés dans un registre. Elle est utilisée pour suivre l'évolution informelle d'un ERP.
*/

class ObjetMainCourante1 extends ModelAbstract
{
    private ?string $objet        = null;
    private ?string $date         = null;
    private ?string $compte_rendu = null;
    private ?string $type         = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['objet'] */
        $object->setObjet($data['objet']);

        /** @var string $data['date'] */
        $object->setDate($data['date']);

        /** @var string $data['compte_rendu'] */
        $object->setCompteRendu($data['compte_rendu']);

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

    public function getDate() : ?string
    {
        return $this->date;
    }

    public function setDate(?string $date) : void
    {
        $this->date = $date;
    }

    public function getCompteRendu() : ?string
    {
        return $this->compte_rendu;
    }

    public function setCompteRendu(string $compte_rendu = null) : void
    {
        $this->compte_rendu=$compte_rendu;
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
