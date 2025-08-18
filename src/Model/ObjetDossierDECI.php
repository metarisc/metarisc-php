<?php

namespace Metarisc\Model;

/*
 * Dossier d'un DECI.
*/

class ObjetDossierDECI extends ModelAbstract
{
    private ?string $objet        = null;
    private ?array $modules       = null;
    private ?string $enveloppe_id = null;
    private ?string $type         = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['objet'] */
        $object->setObjet($data['objet']);

        /** @var string[] $data['modules'] */
        $object->setModules($data['modules']);

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

    public function getModules() : ?array
    {
        return $this->modules;
    }

    public function setModules(array $modules = null) : void
    {
        $this->modules=$modules;
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
