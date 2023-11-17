<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\Utilisateur1;

class Utilisateur1Test extends TestCase
{
    private Utilisateur1 $utilisateur1;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->utilisateur1 = new Utilisateur1();
        $this->utilisateur1->setId($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'id' => $this->utilisateur1->getId(),
        ];
        $object = Utilisateur1::unserialize($data);
        $this->assertInstanceOf(Utilisateur1::class, $object);
    }

    public function testgetId() : void
    {
        $id = $this->utilisateur1->getId();

        $this->assertIsString($id);

        $this->utilisateur1->setId('test id');

        $this->assertSame('test id', $this->utilisateur1->getId());
        $this->assertNotSame($id, $this->utilisateur1->getId());
    }
}
