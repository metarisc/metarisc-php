<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\WorkflowBase;

class WorkflowBaseTest extends TestCase
{
    private WorkflowBase $workflow_base;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->workflow_base = new WorkflowBase();
        $this->workflow_base->setId($this->faker->text);

        $this->workflow_base->setTitre($this->faker->text);

        $this->workflow_base->setDateDeCreation('2023-09-25T09:00:00+00:00');

        $this->workflow_base->setDateDeFin('2023-09-25T09:00:00+00:00');

        $this->workflow_base->setWorkflowAutomatise(false);

        $this->workflow_base->setEtat($this->faker->text);

        $this->workflow_base->setGroupeDeTravail($this->faker->text);

        $this->workflow_base->setObservations($this->faker->text);

        $this->workflow_base->setEstComplet(false);

        $this->workflow_base->setListePoi($this->faker->text);

        $this->workflow_base->setDocuments($this->faker->text);

        $this->workflow_base->setType($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'id'                  => $this->workflow_base->getId(),
            'titre'               => $this->workflow_base->getTitre(),
            'date_de_creation'    => $this->workflow_base->getDateDeCreation(),
            'date_de_fin'         => $this->workflow_base->getDateDeFin(),
            'workflow_automatise' => $this->workflow_base->getWorkflowAutomatise(),
            'etat'                => $this->workflow_base->getEtat(),
            'groupe_de_travail'   => $this->workflow_base->getGroupeDeTravail(),
            'observations'        => $this->workflow_base->getObservations(),
            'est_complet'         => $this->workflow_base->getEstComplet(),
            'liste_poi'           => $this->workflow_base->getListePoi(),
            'documents'           => $this->workflow_base->getDocuments(),
            'type'                => $this->workflow_base->getType(),
        ];
        $object = WorkflowBase::unserialize($data);
        $this->assertInstanceOf(WorkflowBase::class, $object);
    }

    public function testgetId() : void
    {
        $id = $this->workflow_base->getId();

        $this->assertIsString($id);

        $this->workflow_base->setId('test id');

        $this->assertSame('test id', $this->workflow_base->getId());
        $this->assertNotSame($id, $this->workflow_base->getId());
    }

    public function testgetTitre() : void
    {
        $titre = $this->workflow_base->getTitre();

        $this->assertIsString($titre);

        $this->workflow_base->setTitre('test titre');

        $this->assertSame('test titre', $this->workflow_base->getTitre());
        $this->assertNotSame($titre, $this->workflow_base->getTitre());
    }

    public function testgetDateDeCreation() : void
    {
        $date_de_creation = $this->workflow_base->getDateDeCreation();

        $this->assertSame('2023-09-25T09:00:00+00:00', $date_de_creation);
        $this->workflow_base->setDateDeCreation('2023-10-25T09:00:00+00:00');
        $this->assertSame('2023-10-25T09:00:00+00:00', $this->workflow_base->getDateDeCreation());
    }

    public function testgetDateDeFin() : void
    {
        $date_de_fin = $this->workflow_base->getDateDeFin();

        $this->assertSame('2023-09-25T09:00:00+00:00', $date_de_fin);
        $this->workflow_base->setDateDeFin('2023-10-25T09:00:00+00:00');
        $this->assertSame('2023-10-25T09:00:00+00:00', $this->workflow_base->getDateDeFin());
    }

    public function testgetWorkflowAutomatise() : void
    {
        $workflow_automatise = $this->workflow_base->getWorkflowAutomatise();

        $this->assertFalse($workflow_automatise);

        $this->workflow_base->setWorkflowAutomatise(true);

        $this->assertTrue($this->workflow_base->getWorkflowAutomatise());
    }

    public function testgetEtat() : void
    {
        $etat = $this->workflow_base->getEtat();

        $this->assertIsString($etat);

        $this->workflow_base->setEtat('test etat');

        $this->assertSame('test etat', $this->workflow_base->getEtat());
        $this->assertNotSame($etat, $this->workflow_base->getEtat());
    }

    public function testgetGroupeDeTravail() : void
    {
        $groupe_de_travail = $this->workflow_base->getGroupeDeTravail();

        $this->assertIsString($groupe_de_travail);

        $this->workflow_base->setGroupeDeTravail('test groupe_de_travail');

        $this->assertSame('test groupe_de_travail', $this->workflow_base->getGroupeDeTravail());
        $this->assertNotSame($groupe_de_travail, $this->workflow_base->getGroupeDeTravail());
    }

    public function testgetObservations() : void
    {
        $observations = $this->workflow_base->getObservations();

        $this->assertIsString($observations);

        $this->workflow_base->setObservations('test observations');

        $this->assertSame('test observations', $this->workflow_base->getObservations());
        $this->assertNotSame($observations, $this->workflow_base->getObservations());
    }

    public function testgetEstComplet() : void
    {
        $est_complet = $this->workflow_base->getEstComplet();

        $this->assertFalse($est_complet);

        $this->workflow_base->setEstComplet(true);

        $this->assertTrue($this->workflow_base->getEstComplet());
    }

    public function testgetListePoi() : void
    {
        $liste_poi = $this->workflow_base->getListePoi();

        $this->assertIsString($liste_poi);

        $this->workflow_base->setListePoi('test liste_poi');

        $this->assertSame('test liste_poi', $this->workflow_base->getListePoi());
        $this->assertNotSame($liste_poi, $this->workflow_base->getListePoi());
    }

    public function testgetDocuments() : void
    {
        $documents = $this->workflow_base->getDocuments();

        $this->assertIsString($documents);

        $this->workflow_base->setDocuments('test documents');

        $this->assertSame('test documents', $this->workflow_base->getDocuments());
        $this->assertNotSame($documents, $this->workflow_base->getDocuments());
    }

    public function testgetType() : void
    {
        $type = $this->workflow_base->getType();

        $this->assertIsString($type);

        $this->workflow_base->setType('test type');

        $this->assertSame('test type', $this->workflow_base->getType());
        $this->assertNotSame($type, $this->workflow_base->getType());
    }
}
