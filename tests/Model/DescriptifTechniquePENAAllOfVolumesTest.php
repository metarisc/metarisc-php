<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\DescriptifTechniquePENAAllOfVolumes;

class DescriptifTechniquePENAAllOfVolumesTest extends TestCase
{
    private DescriptifTechniquePENAAllOfVolumes $descriptif_technique_pena_all_of_volumes;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->descriptif_technique_pena_all_of_volumes = new DescriptifTechniquePENAAllOfVolumes();

        $this->descriptif_technique_pena_all_of_volumes->setReel($this->faker->randomFloat());
        $this->descriptif_technique_pena_all_of_volumes->setTheorique($this->faker->randomFloat());
    }

    public function testUnserialize() : void
    {
        $data = [
            'reel'      => $this->descriptif_technique_pena_all_of_volumes->getReel(),
            'theorique' => $this->descriptif_technique_pena_all_of_volumes->getTheorique(),
        ];
        $object = DescriptifTechniquePENAAllOfVolumes::unserialize($data);
        $this->assertInstanceOf(DescriptifTechniquePENAAllOfVolumes::class, $object);
    }

    public function testgetReel() : void
    {
        $reel = $this->descriptif_technique_pena_all_of_volumes->getReel();
        $this->assertIsFloat($reel);

        $this->descriptif_technique_pena_all_of_volumes->setReel(1.1);
        $this->assertSame(1.1, $this->descriptif_technique_pena_all_of_volumes->getReel());
        $this->assertNotSame($reel, $this->descriptif_technique_pena_all_of_volumes->getReel());
    }

    public function testgetTheorique() : void
    {
        $theorique = $this->descriptif_technique_pena_all_of_volumes->getTheorique();
        $this->assertIsFloat($theorique);

        $this->descriptif_technique_pena_all_of_volumes->setTheorique(2.1);
        $this->assertSame(2.1, $this->descriptif_technique_pena_all_of_volumes->getTheorique());
        $this->assertNotSame($theorique, $this->descriptif_technique_pena_all_of_volumes->getTheorique());
    }
}
