<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\PostDossierRequest;

class PostDossierRequestTest extends TestCase
{
    private PostDossierRequest $post_dossier_request;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->post_dossier_request = new PostDossierRequest();
        $this->post_dossier_request->setTitre($this->faker->text);

        $this->post_dossier_request->setDescription($this->faker->text);

        $this->post_dossier_request->setWorkflows($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'titre'       => $this->post_dossier_request->getTitre(),
            'description' => $this->post_dossier_request->getDescription(),
            'workflows'   => $this->post_dossier_request->getWorkflows(),
        ];
        $object = PostDossierRequest::unserialize($data);
        $this->assertInstanceOf(PostDossierRequest::class, $object);
    }

    public function testgetTitre() : void
    {
        $titre = $this->post_dossier_request->getTitre();

        $this->assertIsString($titre);

        $this->post_dossier_request->setTitre('test titre');

        $this->assertSame('test titre', $this->post_dossier_request->getTitre());
        $this->assertNotSame($titre, $this->post_dossier_request->getTitre());
    }

    public function testgetDescription() : void
    {
        $description = $this->post_dossier_request->getDescription();

        $this->assertIsString($description);

        $this->post_dossier_request->setDescription('test description');

        $this->assertSame('test description', $this->post_dossier_request->getDescription());
        $this->assertNotSame($description, $this->post_dossier_request->getDescription());
    }

    public function testgetWorkflows() : void
    {
        $workflows = $this->post_dossier_request->getWorkflows();

        $this->assertIsString($workflows);

        $this->post_dossier_request->setWorkflows('test workflows');

        $this->assertSame('test workflows', $this->post_dossier_request->getWorkflows());
        $this->assertNotSame($workflows, $this->post_dossier_request->getWorkflows());
    }
}
