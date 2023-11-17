<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\PatchPoiRequest;

class PatchPoiRequestTest extends TestCase
{
    private PatchPoiRequest $patch_poi_request;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->patch_poi_request = new PatchPoiRequest();
        $this->patch_poi_request->setTest($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'test' => $this->patch_poi_request->getTest(),
        ];
        $object = PatchPoiRequest::unserialize($data);
        $this->assertInstanceOf(PatchPoiRequest::class, $object);
    }

    public function testgetTest() : void
    {
        $test = $this->patch_poi_request->getTest();

        $this->assertIsString($test);

        $this->patch_poi_request->setTest('test test');

        $this->assertSame('test test', $this->patch_poi_request->getTest());
        $this->assertNotSame($test, $this->patch_poi_request->getTest());
    }
}
