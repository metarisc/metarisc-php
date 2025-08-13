<?php

namespace Metarisc\Model;

/*
 * Un dégagement est toute partie de la construction permettant le cheminement d'évacuation des occupants : porte, sortie, issue, circulation horizontale, zone de circulation, escalier, couloir, rampe ... Il est important de prendre en considération que leur nombre diffère de celui du nombre d'unités de passage. En effet, le nombre d'occupants qui empruntent le cheminement, à son point de départ ou après la jonction de plusieurs dégagements, dépend le plus souvent de la largeur initiale de ce cheminement. Celle-ci se calcule en fonction d'une largeur type appelée « unité de passage » (UP) de 0,60 m.
*/

class Degagement extends ModelAbstract
{
    private ?int $nombre_degagements   = null;
    private ?int $nombre_unite_passage = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var int $data['nombre_degagements'] */
        $object->setNombreDegagements($data['nombre_degagements']);

        /** @var int $data['nombre_unite_passage'] */
        $object->setNombreUnitePassage($data['nombre_unite_passage']);

        return $object;
    }

    public function getNombreDegagements() : ?int
    {
        return $this->nombre_degagements;
    }

    public function setNombreDegagements(int $nombre_degagements = null) : void
    {
        $this->nombre_degagements=$nombre_degagements;
    }

    public function getNombreUnitePassage() : ?int
    {
        return $this->nombre_unite_passage;
    }

    public function setNombreUnitePassage(int $nombre_unite_passage = null) : void
    {
        $this->nombre_unite_passage=$nombre_unite_passage;
    }
}
