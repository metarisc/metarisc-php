<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\DescriptifTechniquePENA;
use Metarisc\Model\DescriptifTechniquePENAAllOfVolumes;

class DescriptifTechniquePENATest extends TestCase
{
    private DescriptifTechniquePENA $descriptif_technique_pena;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->descriptif_technique_pena = new DescriptifTechniquePENA();

        $this->descriptif_technique_pena->setEssaisEnginUtilise($this->faker->text);

        $this->descriptif_technique_pena->setEquipements(['GUICHET', 'CITERNE_AERIENNE']);

        $this->descriptif_technique_pena->setNature('POINT_ASPIRATION');

        $volumes = new DescriptifTechniquePENAAllOfVolumes();
        $volumes->setTheorique(2);
        $volumes->setReel(1.2);

        $this->descriptif_technique_pena->setVolumes($volumes);

        $this->descriptif_technique_pena->setRealimentation([
            'debit'                => 1,
            'diametre_canalisation'=> 2.2,
            'nature'               => 'ADDUCTION_EAU',
        ]);

        $this->descriptif_technique_pena->setLibelle($this->faker->text);
        $this->descriptif_technique_pena->setObservationsGenerales($this->faker->paragraph);
        $this->descriptif_technique_pena->setDate('2023-09-25T09:00:00+00:00');

        $this->descriptif_technique_pena->setAnomalies([
            'code'             => $this->faker->uuid,
            'texte'            => $this->faker->text,
            'indice_de_gravite'=> 2,
        ]);

        $this->descriptif_technique_pena->setEstReglementaire(false);
        $this->descriptif_technique_pena->setEstReforme(false);

        $this->descriptif_technique_pena->setDomanialite('publique');
        $this->descriptif_technique_pena->setEstConforme(true);
    }

    public function testgetEssaisEnginUtilise() : void
    {
        $essais_engin_utilise = $this->descriptif_technique_pena->getEssaisEnginUtilise();
        $this->assertIsString($essais_engin_utilise);

        $this->descriptif_technique_pena->setEssaisEnginUtilise('test essais_engin_utilise');

        $this->assertSame('test essais_engin_utilise', $this->descriptif_technique_pena->getEssaisEnginUtilise());
        $this->assertNotSame($essais_engin_utilise, $this->descriptif_technique_pena->getEssaisEnginUtilise());
    }

    public function testgetEquipements() : void
    {
        $equipements = $this->descriptif_technique_pena->getEquipements();
        $this->assertIsArray($equipements);
        $this->descriptif_technique_pena->setEquipements(['test_array', 'test_array1']);
        $this->assertSame(['test_array', 'test_array1'], $this->descriptif_technique_pena->getEquipements());
        $this->assertNotSame($equipements, $this->descriptif_technique_pena->getEquipements());
    }

    public function testgetNature() : void
    {
        $nature = $this->descriptif_technique_pena->getNature();
        $this->assertIsString($nature);

        $this->descriptif_technique_pena->setNature('test nature');

        $this->assertSame('test nature', $this->descriptif_technique_pena->getNature());
        $this->assertNotSame($nature, $this->descriptif_technique_pena->getNature());
    }

    public function testgetVolumes() : void
    {
        $volumes = $this->descriptif_technique_pena->getVolumes();
        $this->assertInstanceOf(DescriptifTechniquePENAAllOfVolumes::class, $volumes);
    }

    public function testgetRealimentation() : void
    {
        $realimentation = $this->descriptif_technique_pena->getRealimentation();
        $this->assertIsArray($realimentation);
        $this->descriptif_technique_pena->setRealimentation(['test_array', 'test_array1']);
        $this->assertSame(['test_array', 'test_array1'], $this->descriptif_technique_pena->getRealimentation());
        $this->assertNotSame($realimentation, $this->descriptif_technique_pena->getRealimentation());
    }
}
