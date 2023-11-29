<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\SuiviAdministratif;

class SuiviAdministratifTest extends TestCase
{
    private SuiviAdministratif $suivi_administratif;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->suivi_administratif = new SuiviAdministratif();
        $this->suivi_administratif->setDescription($this->faker->text);

        $this->suivi_administratif->setDateAjout('2023-09-25T09:00:00+00:00');

        $this->suivi_administratif->setEvenementAutomatique(false);

        $this->suivi_administratif->setCreateur($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'description'           => $this->suivi_administratif->getDescription(),
            'date_ajout'            => $this->suivi_administratif->getDateAjout(),
            'evenement_automatique' => $this->suivi_administratif->getEvenementAutomatique(),
            'createur'              => $this->suivi_administratif->getCreateur(),
        ];
        $object = SuiviAdministratif::unserialize($data);
        $this->assertInstanceOf(SuiviAdministratif::class, $object);
    }

    public function testgetDescription() : void
    {
        $description = $this->suivi_administratif->getDescription();

        $this->assertIsString($description);

        $this->suivi_administratif->setDescription('test description');

        $this->assertSame('test description', $this->suivi_administratif->getDescription());
        $this->assertNotSame($description, $this->suivi_administratif->getDescription());
    }

    public function testgetDateAjout() : void
    {
        $date_ajout = $this->suivi_administratif->getDateAjout();

        $this->assertSame('2023-09-25T09:00:00+00:00', $date_ajout);
        $this->suivi_administratif->setDateAjout('2023-10-25T09:00:00+00:00');
        $this->assertSame('2023-10-25T09:00:00+00:00', $this->suivi_administratif->getDateAjout());
    }

    public function testgetEvenementAutomatique() : void
    {
        $evenement_automatique = $this->suivi_administratif->getEvenementAutomatique();

        $this->assertFalse($evenement_automatique);

        $this->suivi_administratif->setEvenementAutomatique(true);

        $this->assertTrue($this->suivi_administratif->getEvenementAutomatique());
    }

    public function testgetCreateur() : void
    {
        $createur = $this->suivi_administratif->getCreateur();

        $this->assertIsString($createur);

        $this->suivi_administratif->setCreateur('test createur');

        $this->assertSame('test createur', $this->suivi_administratif->getCreateur());
        $this->assertNotSame($createur, $this->suivi_administratif->getCreateur());
    }
}
