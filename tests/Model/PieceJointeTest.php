<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use Metarisc\Model\PieceJointe;
use PHPUnit\Framework\TestCase;

class PieceJointeTest extends TestCase
{
    private PieceJointe $piece_jointe;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->piece_jointe = new PieceJointe();
        $this->piece_jointe->setId($this->faker->text);

        $this->piece_jointe->setUrl($this->faker->text);

        $this->piece_jointe->setNom($this->faker->text);

        $this->piece_jointe->setDescription($this->faker->text);

        $this->piece_jointe->setType($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'id'          => $this->piece_jointe->getId(),
            'url'         => $this->piece_jointe->getUrl(),
            'nom'         => $this->piece_jointe->getNom(),
            'description' => $this->piece_jointe->getDescription(),
            'type'        => $this->piece_jointe->getType(),
        ];
        $object = PieceJointe::unserialize($data);
        $this->assertInstanceOf(PieceJointe::class, $object);
    }

    public function testgetId() : void
    {
        $id = $this->piece_jointe->getId();

        $this->assertIsString($id);

        $this->piece_jointe->setId('test id');

        $this->assertSame('test id', $this->piece_jointe->getId());
        $this->assertNotSame($id, $this->piece_jointe->getId());
    }

    public function testgetUrl() : void
    {
        $url = $this->piece_jointe->getUrl();

        $this->assertIsString($url);

        $this->piece_jointe->setUrl('test url');

        $this->assertSame('test url', $this->piece_jointe->getUrl());
        $this->assertNotSame($url, $this->piece_jointe->getUrl());
    }

    public function testgetNom() : void
    {
        $nom = $this->piece_jointe->getNom();

        $this->assertIsString($nom);

        $this->piece_jointe->setNom('test nom');

        $this->assertSame('test nom', $this->piece_jointe->getNom());
        $this->assertNotSame($nom, $this->piece_jointe->getNom());
    }

    public function testgetDescription() : void
    {
        $description = $this->piece_jointe->getDescription();

        $this->assertIsString($description);

        $this->piece_jointe->setDescription('test description');

        $this->assertSame('test description', $this->piece_jointe->getDescription());
        $this->assertNotSame($description, $this->piece_jointe->getDescription());
    }

    public function testgetType() : void
    {
        $type = $this->piece_jointe->getType();

        $this->assertIsString($type);

        $this->piece_jointe->setType('test type');

        $this->assertSame('test type', $this->piece_jointe->getType());
        $this->assertNotSame($type, $this->piece_jointe->getType());
    }
}
