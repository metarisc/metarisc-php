<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\PostTicketRequest;

class PostTicketRequestTest extends TestCase
{
    private PostTicketRequest $post_ticket_request;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->post_ticket_request = new PostTicketRequest();
        $this->post_ticket_request->setSubject($this->faker->text);

        $this->post_ticket_request->setDescription($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'subject'     => $this->post_ticket_request->getSubject(),
            'description' => $this->post_ticket_request->getDescription(),
        ];
        $object = PostTicketRequest::unserialize($data);
        $this->assertInstanceOf(PostTicketRequest::class, $object);
    }

    public function testgetSubject() : void
    {
        $subject = $this->post_ticket_request->getSubject();

        $this->assertIsString($subject);

        $this->post_ticket_request->setSubject('test subject');

        $this->assertSame('test subject', $this->post_ticket_request->getSubject());
        $this->assertNotSame($subject, $this->post_ticket_request->getSubject());
    }

    public function testgetDescription() : void
    {
        $description = $this->post_ticket_request->getDescription();

        $this->assertIsString($description);

        $this->post_ticket_request->setDescription('test description');

        $this->assertSame('test description', $this->post_ticket_request->getDescription());
        $this->assertNotSame($description, $this->post_ticket_request->getDescription());
    }
}
