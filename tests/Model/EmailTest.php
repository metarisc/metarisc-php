<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use Metarisc\Model\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    private Email $email;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->email = new Email();
        $this->email->setEmail($this->faker->text);

        $this->email->setIsPrimary(false);

        $this->email->setIsPubliclyVisible(false);

        $this->email->setIsVerified(false);
    }

    public function testUnserialize() : void
    {
        $data = [
            'email'               => $this->email->getEmail(),
            'is_primary'          => $this->email->getIsPrimary(),
            'is_publicly_visible' => $this->email->getIsPubliclyVisible(),
            'is_verified'         => $this->email->getIsVerified(),
        ];
        $object = Email::unserialize($data);
        $this->assertInstanceOf(Email::class, $object);
    }

    public function testgetEmail() : void
    {
        $email = $this->email->getEmail();

        $this->assertIsString($email);

        $this->email->setEmail('test email');

        $this->assertSame('test email', $this->email->getEmail());
        $this->assertNotSame($email, $this->email->getEmail());
    }

    public function testgetIsPrimary() : void
    {
        $is_primary = $this->email->getIsPrimary();

        $this->assertFalse($is_primary);

        $this->email->setIsPrimary(true);

        $this->assertTrue($this->email->getIsPrimary());
    }

    public function testgetIsPubliclyVisible() : void
    {
        $is_publicly_visible = $this->email->getIsPubliclyVisible();

        $this->assertFalse($is_publicly_visible);

        $this->email->setIsPubliclyVisible(true);

        $this->assertTrue($this->email->getIsPubliclyVisible());
    }

    public function testgetIsVerified() : void
    {
        $is_verified = $this->email->getIsVerified();

        $this->assertFalse($is_verified);

        $this->email->setIsVerified(true);

        $this->assertTrue($this->email->getIsVerified());
    }
}
