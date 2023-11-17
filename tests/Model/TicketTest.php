<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use Metarisc\Model\Ticket;
use PHPUnit\Framework\TestCase;

class TicketTest extends TestCase
{
    private Ticket $ticket;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->ticket = new Ticket();
        $this->ticket->setId(1);

        $this->ticket->setSubject($this->faker->text);

        $this->ticket->setDescription($this->faker->text);

        $this->ticket->setDescriptionHtml($this->faker->text);

        $this->ticket->setStatus($this->faker->text);

        $this->ticket->setCreatedAt('2023-09-25T09:00:00+00:00');

        $this->ticket->setUpdatedAt('2023-09-25T09:00:00+00:00');
    }

    public function testUnserialize() : void
    {
        $data = [
            'id'               => $this->ticket->getId(),
            'subject'          => $this->ticket->getSubject(),
            'description'      => $this->ticket->getDescription(),
            'description_html' => $this->ticket->getDescriptionHtml(),
            'status'           => $this->ticket->getStatus(),
            'created_at'       => $this->ticket->getCreatedAt(),
            'updated_at'       => $this->ticket->getUpdatedAt(),
        ];
        $object = Ticket::unserialize($data);
        $this->assertInstanceOf(Ticket::class, $object);
    }

    public function testgetId() : void
    {
        $id = $this->ticket->getId();

        $this->assertIsInt($id);

        $this->ticket->setId(2);

        $this->assertSame(2, $this->ticket->getId());
        $this->assertNotSame($id, $this->ticket->getId());
    }

    public function testgetSubject() : void
    {
        $subject = $this->ticket->getSubject();

        $this->assertIsString($subject);

        $this->ticket->setSubject('test subject');

        $this->assertSame('test subject', $this->ticket->getSubject());
        $this->assertNotSame($subject, $this->ticket->getSubject());
    }

    public function testgetDescription() : void
    {
        $description = $this->ticket->getDescription();

        $this->assertIsString($description);

        $this->ticket->setDescription('test description');

        $this->assertSame('test description', $this->ticket->getDescription());
        $this->assertNotSame($description, $this->ticket->getDescription());
    }

    public function testgetDescriptionHtml() : void
    {
        $description_html = $this->ticket->getDescriptionHtml();

        $this->assertIsString($description_html);

        $this->ticket->setDescriptionHtml('test description_html');

        $this->assertSame('test description_html', $this->ticket->getDescriptionHtml());
        $this->assertNotSame($description_html, $this->ticket->getDescriptionHtml());
    }

    public function testgetStatus() : void
    {
        $status = $this->ticket->getStatus();

        $this->assertIsString($status);

        $this->ticket->setStatus('test status');

        $this->assertSame('test status', $this->ticket->getStatus());
        $this->assertNotSame($status, $this->ticket->getStatus());
    }

    public function testgetCreatedAt() : void
    {
        $created_at = $this->ticket->getCreatedAt();

        $this->assertSame('2023-09-25T09:00:00+00:00', $created_at);
        $this->ticket->setCreatedAt('2023-10-25T09:00:00+00:00');
        $this->assertSame('2023-10-25T09:00:00+00:00', $this->ticket->getCreatedAt());
    }

    public function testgetUpdatedAt() : void
    {
        $updated_at = $this->ticket->getUpdatedAt();

        $this->assertSame('2023-09-25T09:00:00+00:00', $updated_at);
        $this->ticket->setUpdatedAt('2023-10-25T09:00:00+00:00');
        $this->assertSame('2023-10-25T09:00:00+00:00', $this->ticket->getUpdatedAt());
    }
}
