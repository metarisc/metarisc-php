<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\DescriptifTechniquePIBI;
use Metarisc\Model\DescriptifTechniquePIBIAllOfPesees;

class DescriptifTechniquePIBITest extends TestCase
{
    private DescriptifTechniquePIBI $descriptif_technique_pibi;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->descriptif_technique_pibi = new DescriptifTechniquePIBI();

        $this->descriptif_technique_pibi->setNumeroSerieAppareil($this->faker->text);

        $this->descriptif_technique_pibi->setSurpression(1.2);

        $this->descriptif_technique_pibi->setNature('PI1x100');

        $this->descriptif_technique_pibi->setCaracteristiquesParticulieres(['RENVERSABLE']);

        $this->descriptif_technique_pibi->setPesees(DescriptifTechniquePIBIAllOfPesees::unserialize([
            'debit_1bar'           => 1.2,
            'pression_debit_requis'=> 1.2,
            'pression_statique'    => 1.2,
            'debit_gueule_bee'     => 1.2,
        ]));

        $this->descriptif_technique_pibi->setLibelle($this->faker->text);
        $this->descriptif_technique_pibi->setObservationsGenerales($this->faker->paragraph);
        $this->descriptif_technique_pibi->setDate('2023-09-25T09:00:00+00:00');
        $this->descriptif_technique_pibi->setAnomalies([
            'code'             => $this->faker->uuid,
            'texte'            => $this->faker->text,
            'indice_de_gravite'=> 2,
        ]);

        $this->descriptif_technique_pibi->setEstReglementaire(false);
        $this->descriptif_technique_pibi->setEstConforme(true);
        $this->descriptif_technique_pibi->setEstReforme(true);

        $this->descriptif_technique_pibi->setDomanialite('publique');
        $this->descriptif_technique_pibi->setPerformanceTheorique(1);
        $this->descriptif_technique_pibi->setPerformanceReelle(2);
    }

    public function testgetNumeroSerieAppareil() : void
    {
        $numero_serie_appareil = $this->descriptif_technique_pibi->getNumeroSerieAppareil();
        $this->assertIsString($numero_serie_appareil);

        $this->descriptif_technique_pibi->setNumeroSerieAppareil('test numero_serie_appareil');

        $this->assertSame('test numero_serie_appareil', $this->descriptif_technique_pibi->getNumeroSerieAppareil());
        $this->assertNotSame($numero_serie_appareil, $this->descriptif_technique_pibi->getNumeroSerieAppareil());
    }

    public function testgetSurpression() : void
    {
        $surpression = $this->descriptif_technique_pibi->getSurpression();
        $this->assertIsFloat($surpression);
        $this->descriptif_technique_pibi->setSurpression(2.2);
        $this->assertSame(2.2, $this->descriptif_technique_pibi->getSurpression());
    }

    public function testgetNature() : void
    {
        $nature = $this->descriptif_technique_pibi->getNature();
        $this->assertIsString($nature);

        $this->descriptif_technique_pibi->setNature('test nature');

        $this->assertSame('test nature', $this->descriptif_technique_pibi->getNature());
        $this->assertNotSame($nature, $this->descriptif_technique_pibi->getNature());
    }

    public function testgetCaracteristiquesParticulieres() : void
    {
        $caracteristiques_particulieres = $this->descriptif_technique_pibi->getCaracteristiquesParticulieres();
        $this->assertIsArray($caracteristiques_particulieres);
        $this->descriptif_technique_pibi->setCaracteristiquesParticulieres(['test_array', 'test_array1']);
        $this->assertSame(['test_array', 'test_array1'], $this->descriptif_technique_pibi->getCaracteristiquesParticulieres());
        $this->assertNotSame($caracteristiques_particulieres, $this->descriptif_technique_pibi->getCaracteristiquesParticulieres());
    }

    public function testgetPesees() : void
    {
        $pesees = $this->descriptif_technique_pibi->getPesees();

        $this->assertInstanceOf(DescriptifTechniquePIBIAllOfPesees::class, $pesees);
    }
}
