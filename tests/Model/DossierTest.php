<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use Metarisc\Model\Type;
use Metarisc\Model\Dossier;
use PHPUnit\Framework\TestCase;

class DossierTest extends TestCase
{
    private Dossier $dossier;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->dossier = new Dossier();
        $this->dossier->setId($this->faker->text);

        $this->dossier->setType([
            'id'       => $this->faker->uuid,
            'titre'    => $this->faker->title,
            'categorie'=> $this->faker->text,
        ]);

        $this->dossier->setDescription($this->faker->text);

        $this->dossier->setDateDeCreation('2023-09-25T09:00:00+00:00');

        $this->dossier->setCreateur($this->faker->text);

        $this->dossier->setApplicationUtilisee($this->faker->text);

        $this->dossier->setStatut($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'id'                   => $this->dossier->getId(),
            'type'                 => [
                'id'       => $this->faker->uuid,
                'titre'    => $this->faker->title,
                'categorie'=> $this->faker->text,
            ],
            'description'          => $this->dossier->getDescription(),
            'date_de_creation'     => $this->dossier->getDateDeCreation(),
            'createur'             => $this->dossier->getCreateur(),
            'application_utilisee' => $this->dossier->getApplicationUtilisee(),
            'statut'               => $this->dossier->getStatut(),
        ];
        $object = Dossier::unserialize($data);
        $this->assertInstanceOf(Dossier::class, $object);
    }

    public function testgetId() : void
    {
        $id = $this->dossier->getId();

        $this->assertIsString($id);

        $this->dossier->setId('test id');

        $this->assertSame('test id', $this->dossier->getId());
        $this->assertNotSame($id, $this->dossier->getId());
    }

    public function testgetType() : void
    {
        $type = $this->dossier->getType();
        $this->assertInstanceOf(Type::class, $type);
    }

    public function testgetDescription() : void
    {
        $description = $this->dossier->getDescription();

        $this->assertIsString($description);

        $this->dossier->setDescription('test description');

        $this->assertSame('test description', $this->dossier->getDescription());
        $this->assertNotSame($description, $this->dossier->getDescription());
    }

    public function testgetDateDeCreation() : void
    {
        $date_de_creation = $this->dossier->getDateDeCreation();

        $this->assertSame('2023-09-25T09:00:00+00:00', $date_de_creation);
        $this->dossier->setDateDeCreation('2023-10-25T09:00:00+00:00');
        $this->assertSame('2023-10-25T09:00:00+00:00', $this->dossier->getDateDeCreation());
    }

    public function testgetCreateur() : void
    {
        $createur = $this->dossier->getCreateur();

        $this->assertIsString($createur);

        $this->dossier->setCreateur('test createur');

        $this->assertSame('test createur', $this->dossier->getCreateur());
        $this->assertNotSame($createur, $this->dossier->getCreateur());
    }

    public function testgetApplicationUtilisee() : void
    {
        $application_utilisee = $this->dossier->getApplicationUtilisee();

        $this->assertIsString($application_utilisee);

        $this->dossier->setApplicationUtilisee('test application_utilisee');

        $this->assertSame('test application_utilisee', $this->dossier->getApplicationUtilisee());
        $this->assertNotSame($application_utilisee, $this->dossier->getApplicationUtilisee());
    }

    public function testgetStatut() : void
    {
        $statut = $this->dossier->getStatut();

        $this->assertIsString($statut);

        $this->dossier->setStatut('test statut');

        $this->assertSame('test statut', $this->dossier->getStatut());
        $this->assertNotSame($statut, $this->dossier->getStatut());
    }
}
