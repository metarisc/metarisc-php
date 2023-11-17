<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\AnomalieDECI;

class AnomalieDECITest extends TestCase
{
    private AnomalieDECI $anomalie_deci;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->anomalie_deci = new AnomalieDECI();
        $this->anomalie_deci->setCode($this->faker->text);

        $this->anomalie_deci->setTexte($this->faker->text);

        $this->anomalie_deci->setIndiceDeGravite(1);
    }

    public function testUnserialize() : void
    {
        $data = [
            'code'              => $this->anomalie_deci->getCode(),
            'texte'             => $this->anomalie_deci->getTexte(),
            'indice_de_gravite' => $this->anomalie_deci->getIndiceDeGravite(),
        ];
        $object = AnomalieDECI::unserialize($data);
        $this->assertInstanceOf(AnomalieDECI::class, $object);
    }

    public function testgetCode() : void
    {
        $code = $this->anomalie_deci->getCode();

        $this->assertIsString($code);

        $this->anomalie_deci->setCode('test code');

        $this->assertSame('test code', $this->anomalie_deci->getCode());
        $this->assertNotSame($code, $this->anomalie_deci->getCode());
    }

    public function testgetTexte() : void
    {
        $texte = $this->anomalie_deci->getTexte();

        $this->assertIsString($texte);

        $this->anomalie_deci->setTexte('test texte');

        $this->assertSame('test texte', $this->anomalie_deci->getTexte());
        $this->assertNotSame($texte, $this->anomalie_deci->getTexte());
    }

    public function testgetIndiceDeGravite() : void
    {
        $indice_de_gravite = $this->anomalie_deci->getIndiceDeGravite();

        $this->assertIsInt($indice_de_gravite);

        $this->anomalie_deci->setIndiceDeGravite(2);

        $this->assertSame(2, $this->anomalie_deci->getIndiceDeGravite());
        $this->assertNotSame($indice_de_gravite, $this->anomalie_deci->getIndiceDeGravite());
    }
}
