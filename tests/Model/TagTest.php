<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use Metarisc\Model\Tag;
use PHPUnit\Framework\TestCase;

class TagTest extends TestCase
{
    private Tag $tag;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->tag = new Tag();
        $this->tag->setMessage($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'message' => $this->tag->getMessage(),
        ];
        $object = Tag::unserialize($data);
        $this->assertInstanceOf(Tag::class, $object);
    }

    public function testgetMessage() : void
    {
        $message = $this->tag->getMessage();

        $this->assertIsString($message);

        $this->tag->setMessage('test message');

        $this->assertSame('test message', $this->tag->getMessage());
        $this->assertNotSame($message, $this->tag->getMessage());
    }
}
