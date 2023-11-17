<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\GetFeature200Response;
use Metarisc\Model\GetFeature200ResponseCrs;

class GetFeature200ResponseTest extends TestCase
{
    private GetFeature200Response $get_feature_200_response;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->get_feature_200_response = new GetFeature200Response();
        $this->get_feature_200_response->setType($this->faker->text);

        $this->get_feature_200_response->setCrs([
            'type'      => $this->faker->text,
            'properties'=> [
                'name'=> $this->faker->name,
            ],
        ]);

        $this->get_feature_200_response->setFeatures(['first', 'second']);
    }

    public function testUnserialize() : void
    {
        $data = [
            'type'     => $this->get_feature_200_response->getType(),
            'crs'      => [
                'type'      => $this->faker->text,
                'properties'=> [
                    'name'=> $this->faker->name,
                ],
            ],
            'features' => $this->get_feature_200_response->getFeatures(),
        ];
        $object = GetFeature200Response::unserialize($data);
        $this->assertInstanceOf(GetFeature200Response::class, $object);
    }

    public function testgetType() : void
    {
        $type = $this->get_feature_200_response->getType();

        $this->assertIsString($type);

        $this->get_feature_200_response->setType('test type');

        $this->assertSame('test type', $this->get_feature_200_response->getType());
        $this->assertNotSame($type, $this->get_feature_200_response->getType());
    }

    public function testgetCrs() : void
    {
        $crs = $this->get_feature_200_response->getCrs();
        $this->assertInstanceOf(GetFeature200ResponseCrs::class, $crs);
    }

    public function testgetFeatures() : void
    {
        $features = $this->get_feature_200_response->getFeatures();

        $this->assertIsArray($features);
        $this->get_feature_200_response->setFeatures(['test_array', 'test_array1']);
        $this->assertSame(['test_array', 'test_array1'], $this->get_feature_200_response->getFeatures());
        $this->assertNotSame($features, $this->get_feature_200_response->getFeatures());
    }
}
