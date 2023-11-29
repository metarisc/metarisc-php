<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use Metarisc\Model\POI;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\AdressePostale;
use Metarisc\Model\DescriptifTechnique;

class POITest extends TestCase
{
    private POI $poi;
    private array $adressePostale;
    private array $descriptifTechnique;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->poi = new POI();
        $this->poi->setId($this->faker->text);

        $this->poi->setDateDeRealisation('2023-09-25T09:00:00+00:00');

        $this->poi->setDateDeDerniereMiseAJour('2023-09-25T09:00:00+00:00');

        $this->poi->setStatut($this->faker->text);

        $this->poi->setReferencesExterieures(['first', 'second']);

        $this->adressePostale = [
            'code_postal'    => $this->faker->text,
            'commune'        => $this->faker->city,
            'voie'           => $this->faker->streetName,
            'code_insee'     => $this->faker->text,
            'arrondissement' => $this->faker->text,
        ];

        $this->poi->setAdressePostale($this->adressePostale);
        $this->poi->setGeometrie($this->faker->text);
        $this->descriptifTechnique = [
            'libelle'                        => $this->faker->text,
            'observations_generales'         => $this->faker->paragraph,
            'date'                           => '2023-09-25T09:00:00+00:00',
            'anomalies'                      => [
                'code'             => $this->faker->uuid,
                'texte'            => $this->faker->text,
                'indice_de_gravite'=> 2,
            ],
            'est_reglementaire'              => false,
            'est_reforme'                    => true,
            'domanialite'                    => 'publique',
            'est_conforme'                   => true,
            'performance_theorique'          => 1,
            'performance_reelle'             => 1,
            'numero_serie_appareil'          => $this->faker->text,
            'surpression'                    => 1.2,
            'nature'                         => 'CITERNE_ENTERREE',
            'caracteristiques_particulieres' => ['RENVERSABLE'],
            'pesees'                         => [
                'debit_1bar'           => 1.2,
                'pression_debit_requis'=> 1.2,
                'pression_statique'    => 1.2,
                'debit_gueule_bee'     => 1.2,
            ],
            'essais_engin_utilise'           => 'MPR',
            'equipements'                    => ['CANNE_ASPIRATION', 'RACCORD_TOURNANT'],
            'volumes'                        => [
                'reel'     => 2,
                'theorique'=> 2,
            ],
            'realimentation'                 => [
                'debit'                => 2,
                'diametre_canalisation'=> 3,
                'nature'               => 'ADDUCTION_EAU',
            ],
        ];
        $this->poi->setDescriptifTechnique($this->descriptifTechnique);
    }

    public function testUnserialize() : void
    {
        $data = [
            'id'                           => $this->poi->getId(),
            'date_de_realisation'          => $this->poi->getDateDeRealisation(),
            'date_de_derniere_mise_a_jour' => $this->poi->getDateDeDerniereMiseAJour(),
            'statut'                       => $this->poi->getStatut(),
            'references_exterieures'       => $this->poi->getReferencesExterieures(),
            'descriptif_technique'         => $this->descriptifTechnique,
            'geometrie'                    => $this->poi->getGeometrie(),
            'adresse_postale'              => $this->adressePostale,
        ];
        $object = POI::unserialize($data);
        $this->assertInstanceOf(POI::class, $object);
    }

    public function testgetId() : void
    {
        $id = $this->poi->getId();

        $this->assertIsString($id);

        $this->poi->setId('test id');

        $this->assertSame('test id', $this->poi->getId());
        $this->assertNotSame($id, $this->poi->getId());
    }

    public function testgetDateDeRealisation() : void
    {
        $date_de_realisation = $this->poi->getDateDeRealisation();

        $this->assertSame('2023-09-25T09:00:00+00:00', $date_de_realisation);
        $this->poi->setDateDeRealisation('2023-10-25T09:00:00+00:00');
        $this->assertSame('2023-10-25T09:00:00+00:00', $this->poi->getDateDeRealisation());
    }

    public function testgetDateDeDerniereMiseAJour() : void
    {
        $date_de_derniere_mise_a_jour = $this->poi->getDateDeDerniereMiseAJour();

        $this->assertSame('2023-09-25T09:00:00+00:00', $date_de_derniere_mise_a_jour);
        $this->poi->setDateDeDerniereMiseAJour('2023-10-25T09:00:00+00:00');
        $this->assertSame('2023-10-25T09:00:00+00:00', $this->poi->getDateDeDerniereMiseAJour());
    }

    public function testgetStatut() : void
    {
        $statut = $this->poi->getStatut();

        $this->assertIsString($statut);

        $this->poi->setStatut('test statut');

        $this->assertSame('test statut', $this->poi->getStatut());
        $this->assertNotSame($statut, $this->poi->getStatut());
    }

    public function testgetReferencesExterieures() : void
    {
        $references_exterieures = $this->poi->getReferencesExterieures();

        $this->assertIsArray($references_exterieures);
        $this->poi->setReferencesExterieures(['test_array', 'test_array1']);
        $this->assertSame(['test_array', 'test_array1'], $this->poi->getReferencesExterieures());
        $this->assertNotSame($references_exterieures, $this->poi->getReferencesExterieures());
    }

    public function testgetDescriptifTechnique() : void
    {
        $descriptif_technique = $this->poi->getDescriptifTechnique();
        $this->assertInstanceOf(DescriptifTechnique::class, $descriptif_technique);
    }

    public function testgetGeometrie() : void
    {
        $geometrie = $this->poi->getGeometrie();

        $this->assertIsString($geometrie);

        $this->poi->setGeometrie('test geometrie');

        $this->assertSame('test geometrie', $this->poi->getGeometrie());
        $this->assertNotSame($geometrie, $this->poi->getGeometrie());
    }

    public function testgetAdressePostale() : void
    {
        $adresse_postale = $this->poi->getAdressePostale();
        $this->assertInstanceOf(AdressePostale::class, $adresse_postale);
    }
}
