<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\GetFeature200ResponseCrsProperties;

class GetFeature200ResponseCrsPropertiesTest extends TestCase
{
    private GetFeature200ResponseCrsProperties $get_feature_200_response_crs_properties;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->get_feature_200_response_crs_properties = new GetFeature200ResponseCrsProperties();
        $this->get_feature_200_response_crs_properties->setName($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'name' => $this->get_feature_200_response_crs_properties->getName(),
        ];
        $object = GetFeature200ResponseCrsProperties::unserialize($data);
        $this->assertInstanceOf(GetFeature200ResponseCrsProperties::class, $object);
    }

    public function testgetName() : void
    {
        $name = $this->get_feature_200_response_crs_properties->getName();

        $this->assertIsString($name);

        $this->get_feature_200_response_crs_properties->setName('test name');

        $this->assertSame('test name', $this->get_feature_200_response_crs_properties->getName());
        $this->assertNotSame($name, $this->get_feature_200_response_crs_properties->getName());
    }
}
