<?php

namespace Metarisc\Model;

/*
 * Étape d'un workflow.
*/

class WorkflowStep extends ModelAbstract
{
    private ?string $name                                      = null;
    private ?\Metarisc\Model\WorkflowStepWorflowData $workflow = null;
    private ?array $needs                                      = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['name'] */
        $object->setName($data['name']);

        /** @var array<array-key, mixed> $data['workflow'] */
        $object->setWorkflow($data['workflow']);

        /** @var string[] $data['needs'] */
        $object->setNeeds($data['needs']);

        return $object;
    }

    public function getName() : ?string
    {
        return $this->name;
    }

    public function setName(string $name = null) : void
    {
        $this->name=$name;
    }

    public function getWorkflow() : ?WorkflowStepWorflowData
    {
        return $this->workflow;
    }

    public function setWorkflow(array $workflow) : void
    {
        $this->workflow=WorkflowStepWorflowData::unserialize($workflow);
    }

    public function getNeeds() : ?array
    {
        return $this->needs;
    }

    public function setNeeds(array $needs = null) : void
    {
        $this->needs=$needs;
    }
}
