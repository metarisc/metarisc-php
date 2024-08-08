<?php

namespace Metarisc\Model;

/*
 * Les dossiers sont un ensemble de documents administratifs et techniques. L'instruction du dossier suit une logique pré-définie selon le type.
*/

class ObjetDossier extends ModelAbstract
{
    private ?string $objet = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['objet'] */
        $object->setObjet($data['objet']);

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
}
