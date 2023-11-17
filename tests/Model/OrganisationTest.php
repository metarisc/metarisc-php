<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\Organisation;

class OrganisationTest extends TestCase
{
    private Organisation $organisation;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->organisation = new Organisation();
        $this->organisation->setId($this->faker->text);

        $this->organisation->setNom($this->faker->text);

        $this->organisation->setLogoUrl($this->faker->text);

        $this->organisation->setType($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'id'       => $this->organisation->getId(),
            'nom'      => $this->organisation->getNom(),
            'logo_url' => $this->organisation->getLogoUrl(),
            'type'     => $this->organisation->getType(),
        ];
        $object = Organisation::unserialize($data);
        $this->assertInstanceOf(Organisation::class, $object);
    }

    public function testgetId() : void
    {
        $id = $this->organisation->getId();

        $this->assertIsString($id);

        $this->organisation->setId('test id');

        $this->assertSame('test id', $this->organisation->getId());
        $this->assertNotSame($id, $this->organisation->getId());
    }

    public function testgetNom() : void
    {
        $nom = $this->organisation->getNom();

        $this->assertIsString($nom);

        $this->organisation->setNom('test nom');

        $this->assertSame('test nom', $this->organisation->getNom());
        $this->assertNotSame($nom, $this->organisation->getNom());
    }

    public function testgetLogoUrl() : void
    {
        $logo_url = $this->organisation->getLogoUrl();

        $this->assertIsString($logo_url);

        $this->organisation->setLogoUrl('test logo_url');

        $this->assertSame('test logo_url', $this->organisation->getLogoUrl());
        $this->assertNotSame($logo_url, $this->organisation->getLogoUrl());
    }

    public function testgetType() : void
    {
        $type = $this->organisation->getType();

        $this->assertIsString($type);

        $this->organisation->setType('test type');

        $this->assertSame('test type', $this->organisation->getType());
        $this->assertNotSame($type, $this->organisation->getType());
    }
}
