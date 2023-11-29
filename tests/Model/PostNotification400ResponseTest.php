<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\PostNotification400Response;

class PostNotification400ResponseTest extends TestCase
{
    private PostNotification400Response $post_notification_400_response;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->post_notification_400_response = new PostNotification400Response();
        $this->post_notification_400_response->setStatusCode(1);

        $this->post_notification_400_response->setType($this->faker->text);

        $this->post_notification_400_response->setTitle($this->faker->text);

        $this->post_notification_400_response->setDetail($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'status_code' => $this->post_notification_400_response->getStatusCode(),
            'type'        => $this->post_notification_400_response->getType(),
            'title'       => $this->post_notification_400_response->getTitle(),
            'detail'      => $this->post_notification_400_response->getDetail(),
        ];
        $object = PostNotification400Response::unserialize($data);
        $this->assertInstanceOf(PostNotification400Response::class, $object);
    }

    public function testgetStatusCode() : void
    {
        $status_code = $this->post_notification_400_response->getStatusCode();

        $this->assertIsInt($status_code);

        $this->post_notification_400_response->setStatusCode(2);

        $this->assertSame(2, $this->post_notification_400_response->getStatusCode());
        $this->assertNotSame($status_code, $this->post_notification_400_response->getStatusCode());
    }

    public function testgetType() : void
    {
        $type = $this->post_notification_400_response->getType();

        $this->assertIsString($type);

        $this->post_notification_400_response->setType('test type');

        $this->assertSame('test type', $this->post_notification_400_response->getType());
        $this->assertNotSame($type, $this->post_notification_400_response->getType());
    }

    public function testgetTitle() : void
    {
        $title = $this->post_notification_400_response->getTitle();

        $this->assertIsString($title);

        $this->post_notification_400_response->setTitle('test title');

        $this->assertSame('test title', $this->post_notification_400_response->getTitle());
        $this->assertNotSame($title, $this->post_notification_400_response->getTitle());
    }

    public function testgetDetail() : void
    {
        $detail = $this->post_notification_400_response->getDetail();

        $this->assertIsString($detail);

        $this->post_notification_400_response->setDetail('test detail');

        $this->assertSame('test detail', $this->post_notification_400_response->getDetail());
        $this->assertNotSame($detail, $this->post_notification_400_response->getDetail());
    }
}
