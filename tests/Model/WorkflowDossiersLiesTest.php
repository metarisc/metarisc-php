<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\WorkflowDossiersLies;

class WorkflowDossiersLiesTest extends TestCase
{
    private WorkflowDossiersLies $workflow_dossiers_lies;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->workflow_dossiers_lies = new WorkflowDossiersLies();

        $this->workflow_dossiers_lies->setDossierLie($this->faker->text);
    }

    public function testgetDossierLie() : void
    {
        $dossier_lie = $this->workflow_dossiers_lies->getDossierLie();
        $this->assertIsString($dossier_lie);

        $this->workflow_dossiers_lies->setDossierLie('test dossier_lie');

        $this->assertSame('test dossier_lie', $this->workflow_dossiers_lies->getDossierLie());
        $this->assertNotSame($dossier_lie, $this->workflow_dossiers_lies->getDossierLie());
    }
}
