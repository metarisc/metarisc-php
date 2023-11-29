<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\DescriptifTechniquePENAAllOfRealimentation;

class DescriptifTechniquePENAAllOfRealimentationTest extends TestCase
{
    private DescriptifTechniquePENAAllOfRealimentation $descriptif_technique_pena_all_of_realimentation;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->descriptif_technique_pena_all_of_realimentation = new DescriptifTechniquePENAAllOfRealimentation();
        $this->descriptif_technique_pena_all_of_realimentation->setNature($this->faker->text);
        $this->descriptif_technique_pena_all_of_realimentation->setDebit(1.2);
        $this->descriptif_technique_pena_all_of_realimentation->setDiametreCanalisation(1.2);
    }

    public function testUnserialize() : void
    {
        $data = [
            'debit'                 => $this->descriptif_technique_pena_all_of_realimentation->getDebit(),
            'diametre_canalisation' => $this->descriptif_technique_pena_all_of_realimentation->getDiametreCanalisation(),
            'nature'                => $this->descriptif_technique_pena_all_of_realimentation->getNature(),
        ];
        $object = DescriptifTechniquePENAAllOfRealimentation::unserialize($data);
        $this->assertInstanceOf(DescriptifTechniquePENAAllOfRealimentation::class, $object);
    }

    public function testgetDebit() : void
    {
        $debit = $this->descriptif_technique_pena_all_of_realimentation->getDebit();
        $this->assertIsFloat($debit);

        $this->descriptif_technique_pena_all_of_realimentation->setDebit(3.1);
        $this->assertSame(3.1, $this->descriptif_technique_pena_all_of_realimentation->getDebit());
        $this->assertNotSame($debit, $this->descriptif_technique_pena_all_of_realimentation->getDebit());
    }

    public function testgetDiametreCanalisation() : void
    {
        $diametre_canalisation = $this->descriptif_technique_pena_all_of_realimentation->getDiametreCanalisation();
        $this->assertIsFloat($diametre_canalisation);

        $this->descriptif_technique_pena_all_of_realimentation->setDiametreCanalisation(4.1);
        $this->assertSame(4.1, $this->descriptif_technique_pena_all_of_realimentation->getDiametreCanalisation());
        $this->assertNotSame($diametre_canalisation, $this->descriptif_technique_pena_all_of_realimentation->getDiametreCanalisation());
    }

    public function testgetNature() : void
    {
        $nature = $this->descriptif_technique_pena_all_of_realimentation->getNature();

        $this->assertIsString($nature);

        $this->descriptif_technique_pena_all_of_realimentation->setNature('test nature');

        $this->assertSame('test nature', $this->descriptif_technique_pena_all_of_realimentation->getNature());
        $this->assertNotSame($nature, $this->descriptif_technique_pena_all_of_realimentation->getNature());
    }
}
