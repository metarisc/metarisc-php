<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\FeatureGeometry;

class FeatureGeometryTest extends TestCase
{
    private FeatureGeometry $feature_geometry;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->feature_geometry = new FeatureGeometry();
        $this->feature_geometry->setType($this->faker->text);

        $this->feature_geometry->setBbox(['first', 'second']);

        $this->feature_geometry->setCoordinates(['first', 'second']);
    }

    public function testUnserialize() : void
    {
        $data = [
            'type'        => $this->feature_geometry->getType(),
            'bbox'        => $this->feature_geometry->getBbox(),
            'coordinates' => $this->feature_geometry->getCoordinates(),
        ];
        $object = FeatureGeometry::unserialize($data);
        $this->assertInstanceOf(FeatureGeometry::class, $object);
    }

    public function testgetType() : void
    {
        $type = $this->feature_geometry->getType();

        $this->assertIsString($type);

        $this->feature_geometry->setType('test type');

        $this->assertSame('test type', $this->feature_geometry->getType());
        $this->assertNotSame($type, $this->feature_geometry->getType());
    }

    public function testgetBbox() : void
    {
        $bbox = $this->feature_geometry->getBbox();

        $this->assertIsArray($bbox);
        $this->feature_geometry->setBbox(['test_array', 'test_array1']);
        $this->assertSame(['test_array', 'test_array1'], $this->feature_geometry->getBbox());
        $this->assertNotSame($bbox, $this->feature_geometry->getBbox());
    }

    public function testgetCoordinates() : void
    {
        $coordinates = $this->feature_geometry->getCoordinates();

        $this->assertIsArray($coordinates);
        $this->feature_geometry->setCoordinates(['test_array', 'test_array1']);
        $this->assertSame(['test_array', 'test_array1'], $this->feature_geometry->getCoordinates());
        $this->assertNotSame($coordinates, $this->feature_geometry->getCoordinates());
    }
}
