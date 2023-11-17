<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use Metarisc\Model\Document;
use PHPUnit\Framework\TestCase;

class DocumentTest extends TestCase
{
    private Document $document;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->document = new Document();
        $this->document->setId($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'id' => $this->document->getId(),
        ];
        $object = Document::unserialize($data);
        $this->assertInstanceOf(Document::class, $object);
    }

    public function testgetId() : void
    {
        $id = $this->document->getId();

        $this->assertIsString($id);

        $this->document->setId('test id');

        $this->assertSame('test id', $this->document->getId());
        $this->assertNotSame($id, $this->document->getId());
    }
}
