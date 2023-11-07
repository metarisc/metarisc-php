<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\AdressePostale;

class AdressePostaleTest extends TestCase
{
    private AdressePostale $adressePostale;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->adressePostale = new AdressePostale();
        $this->adressePostale->setCodePostal($this->faker->postcode);
        $this->adressePostale->setCommune($this->faker->city);
        $this->adressePostale->setVoie($this->faker->streetName);
        $this->adressePostale->setArrondissement($this->faker->city);
        $this->adressePostale->setCodeInsee($this->faker->postcode);
    }

    public function testUnserialize() : void
    {
        $data = [
            'code_postal'   => $this->adressePostale->getCodePostal(),
            'commune'       => $this->adressePostale->getCommune(),
            'voie'          => $this->adressePostale->getVoie(),
            'code_insee'    => $this->adressePostale->getCodeInsee(),
            'arrondissement'=> $this->adressePostale->getArrondissement(),
        ];
        $object = AdressePostale::unserialize($data);

        $this->assertInstanceOf(AdressePostale::class, $object);
    }

    public function testGetCodePostal() : void
    {
        $codePostal = $this->adressePostale->getCodePostal();
        $this->assertIsString($codePostal);

        $this->adressePostale->setCodePostal('62800');

        $this->assertSame('62800', $this->adressePostale->getCodePostal());
        $this->assertNotSame($codePostal, $this->adressePostale->getCodePostal());
    }

    public function testCommune() : void
    {
        $commune = $this->adressePostale->getCommune();
        $this->assertNotNull($commune);

        $this->adressePostale->setCommune('Lievin');

        $this->assertSame('Lievin', $this->adressePostale->getCommune());
        $this->assertNotSame($commune, $this->adressePostale->getCommune());
    }

    public function testVoie() : void
    {
        $voie = $this->adressePostale->getVoie();
        $this->assertIsString($voie);

        $this->adressePostale->setVoie('Chemin');

        $this->assertSame('Chemin', $this->adressePostale->getVoie());
        $this->assertNotSame($voie, $this->adressePostale->getVoie());
    }

    public function testCodeInsee() : void
    {
        $code_insee = $this->adressePostale->getCodeInsee();
        $this->assertIsString($code_insee);

        $this->adressePostale->setCodeInsee("code_insee");

        $this->assertSame("code_insee", $this->adressePostale->getCodeInsee());
        $this->assertNotSame($code_insee, $this->adressePostale->getCodeInsee());
    }

    public function testArrondissement():void
    {
        $arrondissement = $this->adressePostale->getArrondissement();
        $this->assertIsString($arrondissement);

        $this->adressePostale->setArrondissement("arrondissement");
        $this->assertSame("arrondissement", $this->adressePostale->getArrondissement());
    }
}
