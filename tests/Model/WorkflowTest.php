<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use Metarisc\Model\Workflow;
use PHPUnit\Framework\TestCase;

class WorkflowTest extends TestCase
{
    private Workflow $workflow;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->workflow = new Workflow();
        $this->workflow->setId($this->faker->text);

        $this->workflow->setTitre($this->faker->text);

        $this->workflow->setDateDeCreation('2023-09-25T09:00:00+00:00');

        $this->workflow->setDateDeFin('2023-09-25T09:00:00+00:00');

        $this->workflow->setWorkflowAutomatise(false);

        $this->workflow->setEtat($this->faker->text);

        $this->workflow->setGroupeDeTravail($this->faker->text);

        $this->workflow->setObservations($this->faker->text);

        $this->workflow->setEstComplet(false);

        $this->workflow->setListePoi($this->faker->text);

        $this->workflow->setDocuments($this->faker->text);

        $this->workflow->setType($this->faker->text);

        $this->workflow->setDossierLie($this->faker->text);

        $this->workflow->setPeiLie($this->faker->text);

        $this->workflow->setAnomaliesLevees(['first', 'second']);

        $this->workflow->setProgrammationEvenement($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'id'                      => $this->workflow->getId(),
            'titre'                   => $this->workflow->getTitre(),
            'date_de_creation'        => $this->workflow->getDateDeCreation(),
            'date_de_fin'             => $this->workflow->getDateDeFin(),
            'workflow_automatise'     => $this->workflow->getWorkflowAutomatise(),
            'etat'                    => $this->workflow->getEtat(),
            'groupe_de_travail'       => $this->workflow->getGroupeDeTravail(),
            'observations'            => $this->workflow->getObservations(),
            'est_complet'             => $this->workflow->getEstComplet(),
            'liste_poi'               => $this->workflow->getListePoi(),
            'documents'               => $this->workflow->getDocuments(),
            'type'                    => $this->workflow->getType(),
            'dossier_lie'             => $this->workflow->getDossierLie(),
            'pei_lie'                 => $this->workflow->getPeiLie(),
            'anomalies_levees'        => $this->workflow->getAnomaliesLevees(),
            'programmation_evenement' => $this->workflow->getProgrammationEvenement(),
        ];
        $object = Workflow::unserialize($data);
        $this->assertInstanceOf(Workflow::class, $object);
    }

    public function testgetId() : void
    {
        $id = $this->workflow->getId();

        $this->assertIsString($id);

        $this->workflow->setId('test id');

        $this->assertSame('test id', $this->workflow->getId());
        $this->assertNotSame($id, $this->workflow->getId());
    }

    public function testgetTitre() : void
    {
        $titre = $this->workflow->getTitre();

        $this->assertIsString($titre);

        $this->workflow->setTitre('test titre');

        $this->assertSame('test titre', $this->workflow->getTitre());
        $this->assertNotSame($titre, $this->workflow->getTitre());
    }

    public function testgetDateDeCreation() : void
    {
        $date_de_creation = $this->workflow->getDateDeCreation();

        $this->assertSame('2023-09-25T09:00:00+00:00', $date_de_creation);
        $this->workflow->setDateDeCreation('2023-10-25T09:00:00+00:00');
        $this->assertSame('2023-10-25T09:00:00+00:00', $this->workflow->getDateDeCreation());
    }

    public function testgetDateDeFin() : void
    {
        $date_de_fin = $this->workflow->getDateDeFin();

        $this->assertSame('2023-09-25T09:00:00+00:00', $date_de_fin);
        $this->workflow->setDateDeFin('2023-10-25T09:00:00+00:00');
        $this->assertSame('2023-10-25T09:00:00+00:00', $this->workflow->getDateDeFin());
    }

    public function testgetWorkflowAutomatise() : void
    {
        $workflow_automatise = $this->workflow->getWorkflowAutomatise();

        $this->assertFalse($workflow_automatise);

        $this->workflow->setWorkflowAutomatise(true);

        $this->assertTrue($this->workflow->getWorkflowAutomatise());
    }

    public function testgetEtat() : void
    {
        $etat = $this->workflow->getEtat();

        $this->assertIsString($etat);

        $this->workflow->setEtat('test etat');

        $this->assertSame('test etat', $this->workflow->getEtat());
        $this->assertNotSame($etat, $this->workflow->getEtat());
    }

    public function testgetGroupeDeTravail() : void
    {
        $groupe_de_travail = $this->workflow->getGroupeDeTravail();

        $this->assertIsString($groupe_de_travail);

        $this->workflow->setGroupeDeTravail('test groupe_de_travail');

        $this->assertSame('test groupe_de_travail', $this->workflow->getGroupeDeTravail());
        $this->assertNotSame($groupe_de_travail, $this->workflow->getGroupeDeTravail());
    }

    public function testgetObservations() : void
    {
        $observations = $this->workflow->getObservations();

        $this->assertIsString($observations);

        $this->workflow->setObservations('test observations');

        $this->assertSame('test observations', $this->workflow->getObservations());
        $this->assertNotSame($observations, $this->workflow->getObservations());
    }

    public function testgetEstComplet() : void
    {
        $est_complet = $this->workflow->getEstComplet();

        $this->assertFalse($est_complet);

        $this->workflow->setEstComplet(true);

        $this->assertTrue($this->workflow->getEstComplet());
    }

    public function testgetListePoi() : void
    {
        $liste_poi = $this->workflow->getListePoi();

        $this->assertIsString($liste_poi);

        $this->workflow->setListePoi('test liste_poi');

        $this->assertSame('test liste_poi', $this->workflow->getListePoi());
        $this->assertNotSame($liste_poi, $this->workflow->getListePoi());
    }

    public function testgetDocuments() : void
    {
        $documents = $this->workflow->getDocuments();

        $this->assertIsString($documents);

        $this->workflow->setDocuments('test documents');

        $this->assertSame('test documents', $this->workflow->getDocuments());
        $this->assertNotSame($documents, $this->workflow->getDocuments());
    }

    public function testgetType() : void
    {
        $type = $this->workflow->getType();

        $this->assertIsString($type);

        $this->workflow->setType('test type');

        $this->assertSame('test type', $this->workflow->getType());
        $this->assertNotSame($type, $this->workflow->getType());
    }

    public function testgetDossierLie() : void
    {
        $dossier_lie = $this->workflow->getDossierLie();

        $this->assertIsString($dossier_lie);

        $this->workflow->setDossierLie('test dossier_lie');

        $this->assertSame('test dossier_lie', $this->workflow->getDossierLie());
        $this->assertNotSame($dossier_lie, $this->workflow->getDossierLie());
    }

    public function testgetPeiLie() : void
    {
        $pei_lie = $this->workflow->getPeiLie();

        $this->assertIsString($pei_lie);

        $this->workflow->setPeiLie('test pei_lie');

        $this->assertSame('test pei_lie', $this->workflow->getPeiLie());
        $this->assertNotSame($pei_lie, $this->workflow->getPeiLie());
    }

    public function testgetAnomaliesLevees() : void
    {
        $anomalies_levees = $this->workflow->getAnomaliesLevees();

        $this->assertIsArray($anomalies_levees);
        $this->workflow->setAnomaliesLevees(['test_array', 'test_array1']);
        $this->assertSame(['test_array', 'test_array1'], $this->workflow->getAnomaliesLevees());
        $this->assertNotSame($anomalies_levees, $this->workflow->getAnomaliesLevees());
    }

    public function testgetProgrammationEvenement() : void
    {
        $programmation_evenement = $this->workflow->getProgrammationEvenement();

        $this->assertIsString($programmation_evenement);

        $this->workflow->setProgrammationEvenement('test programmation_evenement');

        $this->assertSame('test programmation_evenement', $this->workflow->getProgrammationEvenement());
        $this->assertNotSame($programmation_evenement, $this->workflow->getProgrammationEvenement());
    }
}
