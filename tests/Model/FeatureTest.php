<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use Metarisc\Model\Feature;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\FeatureGeometry;

class FeatureTest extends TestCase
{
    private Feature $feature;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->feature = new Feature();
        $this->feature->setGeometry([
            'type'       => $this->faker->text,
            'bbox'       => [1, 2],
            'coordinates'=> [33, 22],
        ]);
        $this->feature->setType($this->faker->text);
        $this->feature->setProperties(['test properties']);
    }

    public function testUnserialize() : void
    {
        $data = [
            'type'       => $this->feature->getType(),
            'properties' => $this->feature->getProperties(),
            'geometry'   => [
                'type'       => $this->faker->text,
                'bbox'       => [1, 2],
                'coordinates'=> [33, 22],
            ],
        ];
        $object = Feature::unserialize($data);
        $this->assertInstanceOf(Feature::class, $object);
    }

    public function testgetType() : void
    {
        $type = $this->feature->getType();

        $this->assertIsString($type);

        $this->feature->setType('test type');

        $this->assertSame('test type', $this->feature->getType());
        $this->assertNotSame($type, $this->feature->getType());
    }

    public function testgetProperties() : void
    {
        $properties = $this->feature->getProperties();
        $this->assertIsArray($properties);

        $this->feature->setProperties(['new']);
        $this->assertSame(['new'], $this->feature->getProperties());
        $this->assertNotSame($properties, $this->feature->getProperties());
    }

    public function testgetGeometry() : void
    {
        $geometry = $this->feature->getGeometry();
        $this->assertInstanceOf(FeatureGeometry::class, $geometry);
    }
}
