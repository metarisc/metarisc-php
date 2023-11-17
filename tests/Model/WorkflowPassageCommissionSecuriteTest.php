<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\WorkflowPassageCommissionSecurite;

class WorkflowPassageCommissionSecuriteTest extends TestCase
{
    private WorkflowPassageCommissionSecurite $workflow_passage_commission_securite;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->workflow_passage_commission_securite = new WorkflowPassageCommissionSecurite();

        $this->workflow_passage_commission_securite->setProgrammationEvenement($this->faker->text);
    }

    public function testgetProgrammationEvenement() : void
    {
        $programmation_evenement = $this->workflow_passage_commission_securite->getProgrammationEvenement();
        $this->assertIsString($programmation_evenement);

        $this->workflow_passage_commission_securite->setProgrammationEvenement('test programmation_evenement');

        $this->assertSame('test programmation_evenement', $this->workflow_passage_commission_securite->getProgrammationEvenement());
        $this->assertNotSame($programmation_evenement, $this->workflow_passage_commission_securite->getProgrammationEvenement());
    }
}
