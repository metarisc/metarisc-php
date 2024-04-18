<?php

namespace Metarisc\Model;

class WorkflowStepWorkflow extends ModelAbstract
{
    private ?string $titre = null;
    private ?string $type  = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['titre'] */
        $object->setTitre($data['titre']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        return $object;
    }

    public function getTitre() : ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre = null) : void
    {
        $this->titre=$titre;
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
