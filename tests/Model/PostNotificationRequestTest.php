<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\PostNotificationRequest;

class PostNotificationRequestTest extends TestCase
{
    private PostNotificationRequest $post_notification_request;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->post_notification_request = new PostNotificationRequest();
        $this->post_notification_request->setTitle($this->faker->text);

        $this->post_notification_request->setMessage($this->faker->text);
        $this->post_notification_request->setContexte([$this->faker->uuid]);

        $this->post_notification_request->setUtilisateurId($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'title'          => $this->post_notification_request->getTitle(),
            'message'        => $this->post_notification_request->getMessage(),
            'contexte'       => $this->post_notification_request->getContexte(),
            'utilisateur_id' => $this->post_notification_request->getUtilisateurId(),
        ];
        $object = PostNotificationRequest::unserialize($data);
        $this->assertInstanceOf(PostNotificationRequest::class, $object);
    }

    public function testgetTitle() : void
    {
        $title = $this->post_notification_request->getTitle();

        $this->assertIsString($title);

        $this->post_notification_request->setTitle('test title');

        $this->assertSame('test title', $this->post_notification_request->getTitle());
        $this->assertNotSame($title, $this->post_notification_request->getTitle());
    }

    public function testgetMessage() : void
    {
        $message = $this->post_notification_request->getMessage();

        $this->assertIsString($message);

        $this->post_notification_request->setMessage('test message');

        $this->assertSame('test message', $this->post_notification_request->getMessage());
        $this->assertNotSame($message, $this->post_notification_request->getMessage());
    }

    public function testgetContexte() : void
    {
        $contexte = $this->post_notification_request->getContexte();
        $this->assertIsArray($contexte);
    }

    public function testgetUtilisateurId() : void
    {
        $utilisateur_id = $this->post_notification_request->getUtilisateurId();

        $this->assertIsString($utilisateur_id);

        $this->post_notification_request->setUtilisateurId('test utilisateur_id');

        $this->assertSame('test utilisateur_id', $this->post_notification_request->getUtilisateurId());
        $this->assertNotSame($utilisateur_id, $this->post_notification_request->getUtilisateurId());
    }
}
