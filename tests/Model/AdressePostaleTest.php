<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\AdressePostale;

class AdressePostaleTest extends TestCase
{
    private AdressePostale $adresse_postale;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->adresse_postale = new AdressePostale();
        $this->adresse_postale->setCodePostal($this->faker->text);

        $this->adresse_postale->setCommune($this->faker->city);

        $this->adresse_postale->setVoie($this->faker->streetName);

        $this->adresse_postale->setCodeInsee($this->faker->text);

        $this->adresse_postale->setArrondissement($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'code_postal'    => $this->adresse_postale->getCodePostal(),
            'commune'        => $this->adresse_postale->getCommune(),
            'voie'           => $this->adresse_postale->getVoie(),
            'code_insee'     => $this->adresse_postale->getCodeInsee(),
            'arrondissement' => $this->adresse_postale->getArrondissement(),
        ];
        $object = AdressePostale::unserialize($data);
        $this->assertInstanceOf(AdressePostale::class, $object);
    }

    public function testgetCodePostal() : void
    {
        $code_postal = $this->adresse_postale->getCodePostal();

        $this->assertIsString($code_postal);

        $this->adresse_postale->setCodePostal('test code_postal');

        $this->assertSame('test code_postal', $this->adresse_postale->getCodePostal());
        $this->assertNotSame($code_postal, $this->adresse_postale->getCodePostal());
    }

    public function testgetCommune() : void
    {
        $commune = $this->adresse_postale->getCommune();

        $this->assertIsString($commune);

        $this->adresse_postale->setCommune('test commune');

        $this->assertSame('test commune', $this->adresse_postale->getCommune());
        $this->assertNotSame($commune, $this->adresse_postale->getCommune());
    }

    public function testgetVoie() : void
    {
        $voie = $this->adresse_postale->getVoie();

        $this->assertIsString($voie);

        $this->adresse_postale->setVoie('test voie');

        $this->assertSame('test voie', $this->adresse_postale->getVoie());
        $this->assertNotSame($voie, $this->adresse_postale->getVoie());
    }

    public function testgetCodeInsee() : void
    {
        $code_insee = $this->adresse_postale->getCodeInsee();

        $this->assertIsString($code_insee);

        $this->adresse_postale->setCodeInsee('test code_insee');

        $this->assertSame('test code_insee', $this->adresse_postale->getCodeInsee());
        $this->assertNotSame($code_insee, $this->adresse_postale->getCodeInsee());
    }

    public function testgetArrondissement() : void
    {
        $arrondissement = $this->adresse_postale->getArrondissement();

        $this->assertIsString($arrondissement);

        $this->adresse_postale->setArrondissement('test arrondissement');

        $this->assertSame('test arrondissement', $this->adresse_postale->getArrondissement());
        $this->assertNotSame($arrondissement, $this->adresse_postale->getArrondissement());
    }
}
