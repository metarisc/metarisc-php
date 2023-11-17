<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use Metarisc\Model\Type;
use PHPUnit\Framework\TestCase;

class TypeTest extends TestCase
{
    private Type $type;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->type = new Type();
        $this->type->setId($this->faker->text);

        $this->type->setTitre($this->faker->text);

        $this->type->setCategorie($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'id'        => $this->type->getId(),
            'titre'     => $this->type->getTitre(),
            'categorie' => $this->type->getCategorie(),
        ];
        $object = Type::unserialize($data);
        $this->assertInstanceOf(Type::class, $object);
    }

    public function testgetId() : void
    {
        $id = $this->type->getId();

        $this->assertIsString($id);

        $this->type->setId('test id');

        $this->assertSame('test id', $this->type->getId());
        $this->assertNotSame($id, $this->type->getId());
    }

    public function testgetTitre() : void
    {
        $titre = $this->type->getTitre();

        $this->assertIsString($titre);

        $this->type->setTitre('test titre');

        $this->assertSame('test titre', $this->type->getTitre());
        $this->assertNotSame($titre, $this->type->getTitre());
    }

    public function testgetCategorie() : void
    {
        $categorie = $this->type->getCategorie();

        $this->assertIsString($categorie);

        $this->type->setCategorie('test categorie');

        $this->assertSame('test categorie', $this->type->getCategorie());
        $this->assertNotSame($categorie, $this->type->getCategorie());
    }
}
