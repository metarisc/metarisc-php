<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\Ping200Response;

class Ping200ResponseTest extends TestCase
{
    private Ping200Response $ping_200_response;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->ping_200_response = new Ping200Response();
        $this->ping_200_response->setMessage($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'message' => $this->ping_200_response->getMessage(),
        ];
        $object = Ping200Response::unserialize($data);
        $this->assertInstanceOf(Ping200Response::class, $object);
    }

    public function testgetMessage() : void
    {
        $message = $this->ping_200_response->getMessage();

        $this->assertIsString($message);

        $this->ping_200_response->setMessage('test message');

        $this->assertSame('test message', $this->ping_200_response->getMessage());
        $this->assertNotSame($message, $this->ping_200_response->getMessage());
    }
}
