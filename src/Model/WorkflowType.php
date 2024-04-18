<?php

namespace Metarisc\Model;

class WorkflowType extends ModelAbstract
{
    private ?string $dossier_type = null;
    private ?array $steps         = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['dossier_type'] */
        $object->setDossierType($data['dossier_type']);

        /** @var \Metarisc\Model\WorkflowStep[] $data['steps'] */
        $object->setSteps($data['steps']);

        return $object;
    }

    public function getDossierType() : ?string
    {
        return $this->dossier_type;
    }

    public function setDossierType(string $dossier_type = null) : void
    {
        $this->dossier_type=$dossier_type;
    }

    public function getSteps() : ?array
    {
        return $this->steps;
    }

    public function setSteps(array $steps = null) : void
    {
        $this->steps=$steps;
    }
}
