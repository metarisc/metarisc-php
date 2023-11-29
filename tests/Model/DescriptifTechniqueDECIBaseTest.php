<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\DescriptifTechniqueDECIBase;

class DescriptifTechniqueDECIBaseTest extends TestCase
{
    private DescriptifTechniqueDECIBase $descriptif_technique_deci_base;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->descriptif_technique_deci_base = new DescriptifTechniqueDECIBase();

        $this->descriptif_technique_deci_base->setAnomalies(['first', 'second']);

        $this->descriptif_technique_deci_base->setEstReglementaire(false);

        $this->descriptif_technique_deci_base->setEstReforme(false);

        $this->descriptif_technique_deci_base->setDomanialite($this->faker->text);

        $this->descriptif_technique_deci_base->setEstConforme(false);

        $this->descriptif_technique_deci_base->setPerformanceTheorique(1);

        $this->descriptif_technique_deci_base->setPerformanceReelle(1);
    }

    public function testgetAnomalies() : void
    {
        $anomalies = $this->descriptif_technique_deci_base->getAnomalies();
        $this->assertIsArray($anomalies);
        $this->descriptif_technique_deci_base->setAnomalies(['test_array', 'test_array1']);
        $this->assertSame(['test_array', 'test_array1'], $this->descriptif_technique_deci_base->getAnomalies());
        $this->assertNotSame($anomalies, $this->descriptif_technique_deci_base->getAnomalies());
    }

    public function testgetEstReglementaire() : void
    {
        $est_reglementaire = $this->descriptif_technique_deci_base->getEstReglementaire();
        $this->assertFalse($est_reglementaire);

        $this->descriptif_technique_deci_base->setEstReglementaire(true);

        $this->assertTrue($this->descriptif_technique_deci_base->getEstReglementaire());
    }

    public function testgetEstReforme() : void
    {
        $est_reforme = $this->descriptif_technique_deci_base->getEstReforme();
        $this->assertFalse($est_reforme);

        $this->descriptif_technique_deci_base->setEstReforme(true);

        $this->assertTrue($this->descriptif_technique_deci_base->getEstReforme());
    }

    public function testgetDomanialite() : void
    {
        $domanialite = $this->descriptif_technique_deci_base->getDomanialite();
        $this->assertIsString($domanialite);

        $this->descriptif_technique_deci_base->setDomanialite('test domanialite');

        $this->assertSame('test domanialite', $this->descriptif_technique_deci_base->getDomanialite());
        $this->assertNotSame($domanialite, $this->descriptif_technique_deci_base->getDomanialite());
    }

    public function testgetEstConforme() : void
    {
        $est_conforme = $this->descriptif_technique_deci_base->getEstConforme();
        $this->assertFalse($est_conforme);

        $this->descriptif_technique_deci_base->setEstConforme(true);

        $this->assertTrue($this->descriptif_technique_deci_base->getEstConforme());
    }

    public function testgetPerformanceTheorique() : void
    {
        $performance_theorique = $this->descriptif_technique_deci_base->getPerformanceTheorique();
        $this->assertIsInt($performance_theorique);

        $this->descriptif_technique_deci_base->setPerformanceTheorique(2);

        $this->assertSame(2, $this->descriptif_technique_deci_base->getPerformanceTheorique());
        $this->assertNotSame($performance_theorique, $this->descriptif_technique_deci_base->getPerformanceTheorique());
    }

    public function testgetPerformanceReelle() : void
    {
        $performance_reelle = $this->descriptif_technique_deci_base->getPerformanceReelle();
        $this->assertIsInt($performance_reelle);

        $this->descriptif_technique_deci_base->setPerformanceReelle(2);

        $this->assertSame(2, $this->descriptif_technique_deci_base->getPerformanceReelle());
        $this->assertNotSame($performance_reelle, $this->descriptif_technique_deci_base->getPerformanceReelle());
    }
}
