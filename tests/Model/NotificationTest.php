<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\Notification;

class NotificationTest extends TestCase
{
    private Notification $notification;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->notification = new Notification();
        $this->notification->setId($this->faker->text);

        $this->notification->setTitle($this->faker->text);

        $this->notification->setMessage($this->faker->text);
        $this->notification->setContexte([
            'user_name'=> $this->faker->name,
        ]);

        $this->notification->setDateCreation('2023-09-25T09:00:00+00:00');

        $this->notification->setDateDeLecture('2023-09-29T09:00:00+00:00');

        $this->notification->setUtilisateurId($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'id'              => $this->notification->getId(),
            'title'           => $this->notification->getTitle(),
            'message'         => $this->notification->getMessage(),
            'contexte'        => $this->notification->getContexte(),
            'date_creation'   => $this->notification->getDateCreation(),
            'date_de_lecture' => $this->notification->getDateDeLecture(),
            'utilisateur_id'  => $this->notification->getUtilisateurId(),
        ];
        $object = Notification::unserialize($data);
        $this->assertInstanceOf(Notification::class, $object);
    }

    public function testgetId() : void
    {
        $id = $this->notification->getId();

        $this->assertIsString($id);

        $this->notification->setId('test id');

        $this->assertSame('test id', $this->notification->getId());
        $this->assertNotSame($id, $this->notification->getId());
    }

    public function testgetTitle() : void
    {
        $title = $this->notification->getTitle();

        $this->assertIsString($title);

        $this->notification->setTitle('test title');

        $this->assertSame('test title', $this->notification->getTitle());
        $this->assertNotSame($title, $this->notification->getTitle());
    }

    public function testgetMessage() : void
    {
        $message = $this->notification->getMessage();

        $this->assertIsString($message);

        $this->notification->setMessage('test message');

        $this->assertSame('test message', $this->notification->getMessage());
        $this->assertNotSame($message, $this->notification->getMessage());
    }

    public function testgetContexte() : void
    {
        $contexte = $this->notification->getContexte();
        $this->assertIsArray($contexte);
    }

    public function testgetDateCreation() : void
    {
        $date_creation = $this->notification->getDateCreation();

        $this->assertSame('2023-09-25T09:00:00+00:00', $date_creation);
        $this->notification->setDateCreation('2023-10-25T09:00:00+00:00');
        $this->assertSame('2023-10-25T09:00:00+00:00', $this->notification->getDateCreation());
    }

    public function testgetDateDeLecture() : void
    {
        $date_de_lecture = $this->notification->getDateDeLecture();

        $this->assertSame('2023-09-29T09:00:00+00:00', $date_de_lecture);
        $this->notification->setDateDeLecture('2023-10-25T09:00:00+00:00');
        $this->assertSame('2023-10-25T09:00:00+00:00', $this->notification->getDateDeLecture());
    }

    public function testgetUtilisateurId() : void
    {
        $utilisateur_id = $this->notification->getUtilisateurId();

        $this->assertIsString($utilisateur_id);

        $this->notification->setUtilisateurId('test utilisateur_id');

        $this->assertSame('test utilisateur_id', $this->notification->getUtilisateurId());
        $this->assertNotSame($utilisateur_id, $this->notification->getUtilisateurId());
    }
}
