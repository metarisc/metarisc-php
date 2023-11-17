<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\PostEvenementRequest;

class PostEvenementRequestTest extends TestCase
{
    private PostEvenementRequest $post_evenement_request;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->post_evenement_request = new PostEvenementRequest();
        $this->post_evenement_request->setTitle($this->faker->text);

        $this->post_evenement_request->setType($this->faker->text);

        $this->post_evenement_request->setDescription($this->faker->text);

        $this->post_evenement_request->setDateDebut('2023-09-25T09:00:00+00:00');

        $this->post_evenement_request->setDateFin('2023-09-25T09:00:00+00:00');
    }

    public function testUnserialize() : void
    {
        $data = [
            'title'       => $this->post_evenement_request->getTitle(),
            'type'        => $this->post_evenement_request->getType(),
            'description' => $this->post_evenement_request->getDescription(),
            'date_debut'  => $this->post_evenement_request->getDateDebut(),
            'date_fin'    => $this->post_evenement_request->getDateFin(),
        ];
        $object = PostEvenementRequest::unserialize($data);
        $this->assertInstanceOf(PostEvenementRequest::class, $object);
    }

    public function testgetTitle() : void
    {
        $title = $this->post_evenement_request->getTitle();

        $this->assertIsString($title);

        $this->post_evenement_request->setTitle('test title');

        $this->assertSame('test title', $this->post_evenement_request->getTitle());
        $this->assertNotSame($title, $this->post_evenement_request->getTitle());
    }

    public function testgetType() : void
    {
        $type = $this->post_evenement_request->getType();

        $this->assertIsString($type);

        $this->post_evenement_request->setType('test type');

        $this->assertSame('test type', $this->post_evenement_request->getType());
        $this->assertNotSame($type, $this->post_evenement_request->getType());
    }

    public function testgetDescription() : void
    {
        $description = $this->post_evenement_request->getDescription();

        $this->assertIsString($description);

        $this->post_evenement_request->setDescription('test description');

        $this->assertSame('test description', $this->post_evenement_request->getDescription());
        $this->assertNotSame($description, $this->post_evenement_request->getDescription());
    }

    public function testgetDateDebut() : void
    {
        $date_debut = $this->post_evenement_request->getDateDebut();

        $this->assertSame('2023-09-25T09:00:00+00:00', $date_debut);
        $this->post_evenement_request->setDateDebut('2023-10-25T09:00:00+00:00');
        $this->assertSame('2023-10-25T09:00:00+00:00', $this->post_evenement_request->getDateDebut());
    }

    public function testgetDateFin() : void
    {
        $date_fin = $this->post_evenement_request->getDateFin();

        $this->assertSame('2023-09-25T09:00:00+00:00', $date_fin);
        $this->post_evenement_request->setDateFin('2023-10-25T09:00:00+00:00');
        $this->assertSame('2023-10-25T09:00:00+00:00', $this->post_evenement_request->getDateFin());
    }
}
