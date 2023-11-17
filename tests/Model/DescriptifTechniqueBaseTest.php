<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\DescriptifTechniqueBase;

class DescriptifTechniqueBaseTest extends TestCase
{
    private DescriptifTechniqueBase $descriptif_technique_base;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->descriptif_technique_base = new DescriptifTechniqueBase();
        $this->descriptif_technique_base->setLibelle($this->faker->text);

        $this->descriptif_technique_base->setObservationsGenerales($this->faker->text);

        $this->descriptif_technique_base->setDate('2023-09-25T09:00:00+00:00');
    }

    public function testUnserialize() : void
    {
        $data = [
            'libelle'                => $this->descriptif_technique_base->getLibelle(),
            'observations_generales' => $this->descriptif_technique_base->getObservationsGenerales(),
            'date'                   => $this->descriptif_technique_base->getDate(),
        ];
        $object = DescriptifTechniqueBase::unserialize($data);
        $this->assertInstanceOf(DescriptifTechniqueBase::class, $object);
    }

    public function testgetLibelle() : void
    {
        $libelle = $this->descriptif_technique_base->getLibelle();

        $this->assertIsString($libelle);

        $this->descriptif_technique_base->setLibelle('test libelle');

        $this->assertSame('test libelle', $this->descriptif_technique_base->getLibelle());
        $this->assertNotSame($libelle, $this->descriptif_technique_base->getLibelle());
    }

    public function testgetObservationsGenerales() : void
    {
        $observations_generales = $this->descriptif_technique_base->getObservationsGenerales();

        $this->assertIsString($observations_generales);

        $this->descriptif_technique_base->setObservationsGenerales('test observations_generales');

        $this->assertSame('test observations_generales', $this->descriptif_technique_base->getObservationsGenerales());
        $this->assertNotSame($observations_generales, $this->descriptif_technique_base->getObservationsGenerales());
    }

    public function testgetDate() : void
    {
        $date = $this->descriptif_technique_base->getDate();

        $this->assertSame('2023-09-25T09:00:00+00:00', $date);
        $this->descriptif_technique_base->setDate('2023-10-25T09:00:00+00:00');
        $this->assertSame('2023-10-25T09:00:00+00:00', $this->descriptif_technique_base->getDate());
    }
}
