<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\WorkflowRemiseEnServicePEI;

class WorkflowRemiseEnServicePEITest extends TestCase
{
    private WorkflowRemiseEnServicePEI $workflow_remise_en_service_pei;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->workflow_remise_en_service_pei = new WorkflowRemiseEnServicePEI();

        $this->workflow_remise_en_service_pei->setPeiLie($this->faker->text);

        $this->workflow_remise_en_service_pei->setAnomaliesLevees(['first', 'second']);
    }

    public function testgetPeiLie() : void
    {
        $pei_lie = $this->workflow_remise_en_service_pei->getPeiLie();
        $this->assertIsString($pei_lie);

        $this->workflow_remise_en_service_pei->setPeiLie('test pei_lie');

        $this->assertSame('test pei_lie', $this->workflow_remise_en_service_pei->getPeiLie());
        $this->assertNotSame($pei_lie, $this->workflow_remise_en_service_pei->getPeiLie());
    }

    public function testgetAnomaliesLevees() : void
    {
        $anomalies_levees = $this->workflow_remise_en_service_pei->getAnomaliesLevees();
        $this->assertIsArray($anomalies_levees);
        $this->workflow_remise_en_service_pei->setAnomaliesLevees(['test_array', 'test_array1']);
        $this->assertSame(['test_array', 'test_array1'], $this->workflow_remise_en_service_pei->getAnomaliesLevees());
        $this->assertNotSame($anomalies_levees, $this->workflow_remise_en_service_pei->getAnomaliesLevees());
    }
}
