<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use Metarisc\Model\Utilisateur;
use PHPUnit\Framework\TestCase;

class UtilisateurTest extends TestCase
{
    private Utilisateur $utilisateur;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->utilisateur = new Utilisateur();
        $this->utilisateur->setId($this->faker->text);

        $this->utilisateur->setFirstName($this->faker->text);

        $this->utilisateur->setLastName($this->faker->text);

        $this->utilisateur->setCreatedAt('2023-09-25T09:00:00+00:00');

        $this->utilisateur->setUpdatedAt('2023-09-25T09:00:00+00:00');

        $this->utilisateur->setTimezone($this->faker->text);

        $this->utilisateur->setIsActive(false);

        $this->utilisateur->setIsVerified(false);

        $this->utilisateur->setFonction($this->faker->text);

        $this->utilisateur->setAvatarUrl($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'id'          => $this->utilisateur->getId(),
            'first_name'  => $this->utilisateur->getFirstName(),
            'last_name'   => $this->utilisateur->getLastName(),
            'created_at'  => $this->utilisateur->getCreatedAt(),
            'updated_at'  => $this->utilisateur->getUpdatedAt(),
            'timezone'    => $this->utilisateur->getTimezone(),
            'is_active'   => $this->utilisateur->getIsActive(),
            'is_verified' => $this->utilisateur->getIsVerified(),
            'fonction'    => $this->utilisateur->getFonction(),
            'avatar_url'  => $this->utilisateur->getAvatarUrl(),
        ];
        $object = Utilisateur::unserialize($data);
        $this->assertInstanceOf(Utilisateur::class, $object);
    }

    public function testgetId() : void
    {
        $id = $this->utilisateur->getId();

        $this->assertIsString($id);

        $this->utilisateur->setId('test id');

        $this->assertSame('test id', $this->utilisateur->getId());
        $this->assertNotSame($id, $this->utilisateur->getId());
    }

    public function testgetFirstName() : void
    {
        $first_name = $this->utilisateur->getFirstName();

        $this->assertIsString($first_name);

        $this->utilisateur->setFirstName('test first_name');

        $this->assertSame('test first_name', $this->utilisateur->getFirstName());
        $this->assertNotSame($first_name, $this->utilisateur->getFirstName());
    }

    public function testgetLastName() : void
    {
        $last_name = $this->utilisateur->getLastName();

        $this->assertIsString($last_name);

        $this->utilisateur->setLastName('test last_name');

        $this->assertSame('test last_name', $this->utilisateur->getLastName());
        $this->assertNotSame($last_name, $this->utilisateur->getLastName());
    }

    public function testgetCreatedAt() : void
    {
        $created_at = $this->utilisateur->getCreatedAt();

        $this->assertSame('2023-09-25T09:00:00+00:00', $created_at);
        $this->utilisateur->setCreatedAt('2023-10-25T09:00:00+00:00');
        $this->assertSame('2023-10-25T09:00:00+00:00', $this->utilisateur->getCreatedAt());
    }

    public function testgetUpdatedAt() : void
    {
        $updated_at = $this->utilisateur->getUpdatedAt();

        $this->assertSame('2023-09-25T09:00:00+00:00', $updated_at);
        $this->utilisateur->setUpdatedAt('2023-10-25T09:00:00+00:00');
        $this->assertSame('2023-10-25T09:00:00+00:00', $this->utilisateur->getUpdatedAt());
    }

    public function testgetTimezone() : void
    {
        $timezone = $this->utilisateur->getTimezone();

        $this->assertIsString($timezone);

        $this->utilisateur->setTimezone('test timezone');

        $this->assertSame('test timezone', $this->utilisateur->getTimezone());
        $this->assertNotSame($timezone, $this->utilisateur->getTimezone());
    }

    public function testgetIsActive() : void
    {
        $is_active = $this->utilisateur->getIsActive();

        $this->assertFalse($is_active);

        $this->utilisateur->setIsActive(true);

        $this->assertTrue($this->utilisateur->getIsActive());
    }

    public function testgetIsVerified() : void
    {
        $is_verified = $this->utilisateur->getIsVerified();

        $this->assertFalse($is_verified);

        $this->utilisateur->setIsVerified(true);

        $this->assertTrue($this->utilisateur->getIsVerified());
    }

    public function testgetFonction() : void
    {
        $fonction = $this->utilisateur->getFonction();

        $this->assertIsString($fonction);

        $this->utilisateur->setFonction('test fonction');

        $this->assertSame('test fonction', $this->utilisateur->getFonction());
        $this->assertNotSame($fonction, $this->utilisateur->getFonction());
    }

    public function testgetAvatarUrl() : void
    {
        $avatar_url = $this->utilisateur->getAvatarUrl();

        $this->assertIsString($avatar_url);

        $this->utilisateur->setAvatarUrl('test avatar_url');

        $this->assertSame('test avatar_url', $this->utilisateur->getAvatarUrl());
        $this->assertNotSame($avatar_url, $this->utilisateur->getAvatarUrl());
    }
}
