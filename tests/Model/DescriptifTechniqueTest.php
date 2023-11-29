<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\DescriptifTechnique;
use Metarisc\Model\DescriptifTechniquePIBIAllOfPesees;
use Metarisc\Model\DescriptifTechniquePENAAllOfVolumes;

class DescriptifTechniqueTest extends TestCase
{
    private DescriptifTechnique $descriptif_technique;
    private array $tableau_anomalies;
    private array $tableau_pesees;
    private array $tableau_volumes;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->descriptif_technique = new DescriptifTechnique();
        $this->descriptif_technique->setLibelle($this->faker->text);

        $this->descriptif_technique->setObservationsGenerales($this->faker->text);

        $this->descriptif_technique->setDate('2023-09-25T09:00:00+00:00');

        $this->tableau_anomalies = [
            'code'             => $this->faker->uuid,
            'texte'            => $this->faker->text,
            'indice_de_gravite'=> 2,
        ];
        $this->descriptif_technique->setAnomalies($this->tableau_anomalies);

        $this->descriptif_technique->setEstReglementaire(false);

        $this->descriptif_technique->setEstReforme(false);

        $this->descriptif_technique->setDomanialite('publique');

        $this->descriptif_technique->setEstConforme(false);

        $this->descriptif_technique->setPerformanceTheorique(1);

        $this->descriptif_technique->setPerformanceReelle(1);

        $this->descriptif_technique->setNumeroSerieAppareil($this->faker->text);

        $this->descriptif_technique->setSurpression(1.2);

        $this->descriptif_technique->setNature('CITERNE_ENTERREE');

        $this->descriptif_technique->setCaracteristiquesParticulieres(['RENVERSABLE']);

        $this->descriptif_technique->setEssaisEnginUtilise('MPR');

        $this->descriptif_technique->setEquipements(['CANNE_ASPIRATION', 'RACCORD_TOURNANT']);

        $this->descriptif_technique->setRealimentation([
            'debit'                => 2,
            'diametre_canalisation'=> 3,
            'nature'               => 'ADDUCTION_EAU',
        ]);
        $this->tableau_pesees = [
            'debit_1bar'           => 1.2,
            'pression_debit_requis'=> 1.2,
            'pression_statique'    => 1.2,
            'debit_gueule_bee'     => 1.2,
        ];

        $this->descriptif_technique->setPesees($this->tableau_pesees);

        $this->tableau_volumes = [
            'reel'     => 2,
            'theorique'=> 2,
        ];
        $this->descriptif_technique->setVolumes($this->tableau_volumes);
    }

    public function testUnserialize() : void
    {
        $data = [
            'libelle'                        => $this->descriptif_technique->getLibelle(),
            'observations_generales'         => $this->descriptif_technique->getObservationsGenerales(),
            'date'                           => $this->descriptif_technique->getDate(),
            'anomalies'                      => $this->tableau_anomalies,
            'est_reglementaire'              => $this->descriptif_technique->getEstReglementaire(),
            'est_reforme'                    => $this->descriptif_technique->getEstReforme(),
            'domanialite'                    => $this->descriptif_technique->getDomanialite(),
            'est_conforme'                   => $this->descriptif_technique->getEstConforme(),
            'performance_theorique'          => $this->descriptif_technique->getPerformanceTheorique(),
            'performance_reelle'             => $this->descriptif_technique->getPerformanceReelle(),
            'numero_serie_appareil'          => $this->descriptif_technique->getNumeroSerieAppareil(),
            'surpression'                    => $this->descriptif_technique->getSurpression(),
            'nature'                         => $this->descriptif_technique->getNature(),
            'caracteristiques_particulieres' => $this->descriptif_technique->getCaracteristiquesParticulieres(),
            'pesees'                         => $this->tableau_pesees,
            'essais_engin_utilise'           => $this->descriptif_technique->getEssaisEnginUtilise(),
            'equipements'                    => $this->descriptif_technique->getEquipements(),
            'volumes'                        => $this->tableau_volumes,
            'realimentation'                 => $this->descriptif_technique->getRealimentation(),
        ];
        $object = DescriptifTechnique::unserialize($data);
        $this->assertInstanceOf(DescriptifTechnique::class, $object);
    }

    public function testgetLibelle() : void
    {
        $libelle = $this->descriptif_technique->getLibelle();

        $this->assertIsString($libelle);

        $this->descriptif_technique->setLibelle('test libelle');

        $this->assertSame('test libelle', $this->descriptif_technique->getLibelle());
        $this->assertNotSame($libelle, $this->descriptif_technique->getLibelle());
    }

    public function testgetObservationsGenerales() : void
    {
        $observations_generales = $this->descriptif_technique->getObservationsGenerales();

        $this->assertIsString($observations_generales);

        $this->descriptif_technique->setObservationsGenerales('test observations_generales');

        $this->assertSame('test observations_generales', $this->descriptif_technique->getObservationsGenerales());
        $this->assertNotSame($observations_generales, $this->descriptif_technique->getObservationsGenerales());
    }

    public function testgetDate() : void
    {
        $date = $this->descriptif_technique->getDate();

        $this->assertSame('2023-09-25T09:00:00+00:00', $date);
        $this->descriptif_technique->setDate('2023-10-25T09:00:00+00:00');
        $this->assertSame('2023-10-25T09:00:00+00:00', $this->descriptif_technique->getDate());
    }

    public function testgetAnomalies() : void
    {
        $anomalies = $this->descriptif_technique->getAnomalies();

        $this->assertIsArray($anomalies);
        $this->descriptif_technique->setAnomalies(['test_array', 'test_array1']);
        $this->assertSame(['test_array', 'test_array1'], $this->descriptif_technique->getAnomalies());
        $this->assertNotSame($anomalies, $this->descriptif_technique->getAnomalies());
    }

    public function testgetEstReglementaire() : void
    {
        $est_reglementaire = $this->descriptif_technique->getEstReglementaire();

        $this->assertFalse($est_reglementaire);

        $this->descriptif_technique->setEstReglementaire(true);

        $this->assertTrue($this->descriptif_technique->getEstReglementaire());
    }

    public function testgetEstReforme() : void
    {
        $est_reforme = $this->descriptif_technique->getEstReforme();

        $this->assertFalse($est_reforme);

        $this->descriptif_technique->setEstReforme(true);

        $this->assertTrue($this->descriptif_technique->getEstReforme());
    }

    public function testgetDomanialite() : void
    {
        $domanialite = $this->descriptif_technique->getDomanialite();

        $this->assertIsString($domanialite);

        $this->descriptif_technique->setDomanialite('privee_conventionnee');

        $this->assertSame('privee_conventionnee', $this->descriptif_technique->getDomanialite());
        $this->assertNotSame($domanialite, $this->descriptif_technique->getDomanialite());
    }

    public function testgetEstConforme() : void
    {
        $est_conforme = $this->descriptif_technique->getEstConforme();

        $this->assertFalse($est_conforme);

        $this->descriptif_technique->setEstConforme(true);

        $this->assertTrue($this->descriptif_technique->getEstConforme());
    }

    public function testgetPerformanceTheorique() : void
    {
        $performance_theorique = $this->descriptif_technique->getPerformanceTheorique();
        $this->assertIsInt($performance_theorique);

        $this->descriptif_technique->setPerformanceTheorique(2);

        $this->assertSame(2, $this->descriptif_technique->getPerformanceTheorique());
        $this->assertNotSame($performance_theorique, $this->descriptif_technique->getPerformanceTheorique());
    }

    public function testgetPerformanceReelle() : void
    {
        $performance_reelle = $this->descriptif_technique->getPerformanceReelle();
        $this->assertIsInt($performance_reelle);

        $this->descriptif_technique->setPerformanceReelle(2);

        $this->assertSame(2, $this->descriptif_technique->getPerformanceReelle());
        $this->assertNotSame($performance_reelle, $this->descriptif_technique->getPerformanceReelle());
    }

    public function testgetNumeroSerieAppareil() : void
    {
        $numero_serie_appareil = $this->descriptif_technique->getNumeroSerieAppareil();

        $this->assertIsString($numero_serie_appareil);

        $this->descriptif_technique->setNumeroSerieAppareil('test numero_serie_appareil');

        $this->assertSame('test numero_serie_appareil', $this->descriptif_technique->getNumeroSerieAppareil());
        $this->assertNotSame($numero_serie_appareil, $this->descriptif_technique->getNumeroSerieAppareil());
    }

    public function testgetSurpression() : void
    {
        $surpression = $this->descriptif_technique->getSurpression();

        $this->assertIsFloat($surpression);
        $this->descriptif_technique->setSurpression(2.2);
        $this->assertSame(2.2, $this->descriptif_technique->getSurpression());
    }

    public function testgetNature() : void
    {
        $nature = $this->descriptif_technique->getNature();

        $this->assertIsString($nature);

        $this->descriptif_technique->setNature('PUISARD_ASPIRATION');

        $this->assertSame('PUISARD_ASPIRATION', $this->descriptif_technique->getNature());
        $this->assertNotSame($nature, $this->descriptif_technique->getNature());
    }

    public function testgetCaracteristiquesParticulieres() : void
    {
        $caracteristiques_particulieres = $this->descriptif_technique->getCaracteristiquesParticulieres();

        $this->assertIsArray($caracteristiques_particulieres);
        $this->descriptif_technique->setCaracteristiquesParticulieres(['test_array', 'test_array1']);
        $this->assertSame(['test_array', 'test_array1'], $this->descriptif_technique->getCaracteristiquesParticulieres());
        $this->assertNotSame($caracteristiques_particulieres, $this->descriptif_technique->getCaracteristiquesParticulieres());
    }

    public function testgetPesees() : void
    {
        $pesees = $this->descriptif_technique->getPesees();
        $this->assertInstanceOf(DescriptifTechniquePIBIAllOfPesees::class, $pesees);
    }

    public function testgetEssaisEnginUtilise() : void
    {
        $essais_engin_utilise = $this->descriptif_technique->getEssaisEnginUtilise();

        $this->assertIsString($essais_engin_utilise);

        $this->descriptif_technique->setEssaisEnginUtilise('FPT');

        $this->assertSame('FPT', $this->descriptif_technique->getEssaisEnginUtilise());
        $this->assertNotSame($essais_engin_utilise, $this->descriptif_technique->getEssaisEnginUtilise());
    }

    public function testgetEquipements() : void
    {
        $equipements = $this->descriptif_technique->getEquipements();

        $this->assertIsArray($equipements);
        $this->descriptif_technique->setEquipements(['PUIT', 'PRISE_DIRECTE']);
        $this->assertSame(['PUIT', 'PRISE_DIRECTE'], $this->descriptif_technique->getEquipements());
        $this->assertNotSame($equipements, $this->descriptif_technique->getEquipements());
    }

    public function testgetVolumes() : void
    {
        $volumes = $this->descriptif_technique->getVolumes();
        $this->assertInstanceOf(DescriptifTechniquePENAAllOfVolumes::class, $volumes);
    }

    public function testgetRealimentation() : void
    {
        $realimentation = $this->descriptif_technique->getRealimentation();

        $this->assertIsArray($realimentation);
    }
}
