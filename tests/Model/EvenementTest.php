<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use Metarisc\Model\Evenement;
use PHPUnit\Framework\TestCase;

class EvenementTest extends TestCase
{
    private Evenement $evenement;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->evenement = new Evenement();
        $this->evenement->setId($this->faker->text);

        $this->evenement->setTitle($this->faker->text);

        $this->evenement->setType($this->faker->text);

        $this->evenement->setDescription($this->faker->text);

        $this->evenement->setDateDebut('2023-09-25T09:00:00+00:00');

        $this->evenement->setDateFin('2023-09-25T09:00:00+00:00');
    }

    public function testUnserialize() : void
    {
        $data = [
            'id'          => $this->evenement->getId(),
            'title'       => $this->evenement->getTitle(),
            'type'        => $this->evenement->getType(),
            'description' => $this->evenement->getDescription(),
            'date_debut'  => $this->evenement->getDateDebut(),
            'date_fin'    => $this->evenement->getDateFin(),
        ];
        $object = Evenement::unserialize($data);
        $this->assertInstanceOf(Evenement::class, $object);
    }

    public function testgetId() : void
    {
        $id = $this->evenement->getId();

        $this->assertIsString($id);

        $this->evenement->setId('test id');

        $this->assertSame('test id', $this->evenement->getId());
        $this->assertNotSame($id, $this->evenement->getId());
    }

    public function testgetTitle() : void
    {
        $title = $this->evenement->getTitle();

        $this->assertIsString($title);

        $this->evenement->setTitle('test title');

        $this->assertSame('test title', $this->evenement->getTitle());
        $this->assertNotSame($title, $this->evenement->getTitle());
    }

    public function testgetType() : void
    {
        $type = $this->evenement->getType();

        $this->assertIsString($type);

        $this->evenement->setType('test type');

        $this->assertSame('test type', $this->evenement->getType());
        $this->assertNotSame($type, $this->evenement->getType());
    }

    public function testgetDescription() : void
    {
        $description = $this->evenement->getDescription();

        $this->assertIsString($description);

        $this->evenement->setDescription('test description');

        $this->assertSame('test description', $this->evenement->getDescription());
        $this->assertNotSame($description, $this->evenement->getDescription());
    }

    public function testgetDateDebut() : void
    {
        $date_debut = $this->evenement->getDateDebut();

        $this->assertSame('2023-09-25T09:00:00+00:00', $date_debut);
        $this->evenement->setDateDebut('2023-10-25T09:00:00+00:00');
        $this->assertSame('2023-10-25T09:00:00+00:00', $this->evenement->getDateDebut());
    }

    public function testgetDateFin() : void
    {
        $date_fin = $this->evenement->getDateFin();

        $this->assertSame('2023-09-25T09:00:00+00:00', $date_fin);
        $this->evenement->setDateFin('2023-10-25T09:00:00+00:00');
        $this->assertSame('2023-10-25T09:00:00+00:00', $this->evenement->getDateFin());
    }
}
