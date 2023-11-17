<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\GetFeature200ResponseCrs;
use Metarisc\Model\GetFeature200ResponseCrsProperties;

class GetFeature200ResponseCrsTest extends TestCase
{
    private GetFeature200ResponseCrs $get_feature_200_response_crs;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->get_feature_200_response_crs = new GetFeature200ResponseCrs();
        $this->get_feature_200_response_crs->setType($this->faker->text);
        $this->get_feature_200_response_crs->setProperties([
            'name'=> $this->faker->name,
        ]);
    }

    public function testUnserialize() : void
    {
        $data = [
            'type'       => $this->get_feature_200_response_crs->getType(),
            'properties' => [
                'name'=> $this->faker->name,
            ],
        ];
        $object = GetFeature200ResponseCrs::unserialize($data);
        $this->assertInstanceOf(GetFeature200ResponseCrs::class, $object);
    }

    public function testgetType() : void
    {
        $type = $this->get_feature_200_response_crs->getType();

        $this->assertIsString($type);

        $this->get_feature_200_response_crs->setType('test type');

        $this->assertSame('test type', $this->get_feature_200_response_crs->getType());
        $this->assertNotSame($type, $this->get_feature_200_response_crs->getType());
    }

    public function testgetProperties() : void
    {
        $properties = $this->get_feature_200_response_crs->getProperties();
        $this->assertInstanceOf(GetFeature200ResponseCrsProperties::class, $properties);
    }
}
