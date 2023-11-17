<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\GetNotification404Response;

class GetNotification404ResponseTest extends TestCase
{
    private GetNotification404Response $get_notification_404_response;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->get_notification_404_response = new GetNotification404Response();
        $this->get_notification_404_response->setStatusCode(1);

        $this->get_notification_404_response->setType($this->faker->text);

        $this->get_notification_404_response->setTitle($this->faker->text);

        $this->get_notification_404_response->setDetail($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'status_code' => $this->get_notification_404_response->getStatusCode(),
            'type'        => $this->get_notification_404_response->getType(),
            'title'       => $this->get_notification_404_response->getTitle(),
            'detail'      => $this->get_notification_404_response->getDetail(),
        ];
        $object = GetNotification404Response::unserialize($data);
        $this->assertInstanceOf(GetNotification404Response::class, $object);
    }

    public function testgetStatusCode() : void
    {
        $status_code = $this->get_notification_404_response->getStatusCode();

        $this->assertIsInt($status_code);

        $this->get_notification_404_response->setStatusCode(2);

        $this->assertSame(2, $this->get_notification_404_response->getStatusCode());
        $this->assertNotSame($status_code, $this->get_notification_404_response->getStatusCode());
    }

    public function testgetType() : void
    {
        $type = $this->get_notification_404_response->getType();

        $this->assertIsString($type);

        $this->get_notification_404_response->setType('test type');

        $this->assertSame('test type', $this->get_notification_404_response->getType());
        $this->assertNotSame($type, $this->get_notification_404_response->getType());
    }

    public function testgetTitle() : void
    {
        $title = $this->get_notification_404_response->getTitle();

        $this->assertIsString($title);

        $this->get_notification_404_response->setTitle('test title');

        $this->assertSame('test title', $this->get_notification_404_response->getTitle());
        $this->assertNotSame($title, $this->get_notification_404_response->getTitle());
    }

    public function testgetDetail() : void
    {
        $detail = $this->get_notification_404_response->getDetail();

        $this->assertIsString($detail);

        $this->get_notification_404_response->setDetail('test detail');

        $this->assertSame('test detail', $this->get_notification_404_response->getDetail());
        $this->assertNotSame($detail, $this->get_notification_404_response->getDetail());
    }
}
