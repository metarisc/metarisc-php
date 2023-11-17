<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\POIReferencesExterieuresInner;

class POIReferencesExterieuresInnerTest extends TestCase
{
    private POIReferencesExterieuresInner $poi_references_exterieures_inner;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->poi_references_exterieures_inner = new POIReferencesExterieuresInner();
        $this->poi_references_exterieures_inner->setTitre($this->faker->text);

        $this->poi_references_exterieures_inner->setValeur($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'titre'  => $this->poi_references_exterieures_inner->getTitre(),
            'valeur' => $this->poi_references_exterieures_inner->getValeur(),
        ];
        $object = POIReferencesExterieuresInner::unserialize($data);
        $this->assertInstanceOf(POIReferencesExterieuresInner::class, $object);
    }

    public function testgetTitre() : void
    {
        $titre = $this->poi_references_exterieures_inner->getTitre();

        $this->assertIsString($titre);

        $this->poi_references_exterieures_inner->setTitre('test titre');

        $this->assertSame('test titre', $this->poi_references_exterieures_inner->getTitre());
        $this->assertNotSame($titre, $this->poi_references_exterieures_inner->getTitre());
    }

    public function testgetValeur() : void
    {
        $valeur = $this->poi_references_exterieures_inner->getValeur();

        $this->assertIsString($valeur);

        $this->poi_references_exterieures_inner->setValeur('test valeur');

        $this->assertSame('test valeur', $this->poi_references_exterieures_inner->getValeur());
        $this->assertNotSame($valeur, $this->poi_references_exterieures_inner->getValeur());
    }
}
