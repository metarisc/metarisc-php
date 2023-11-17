<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use Metarisc\Model\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    private Contact $contact;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->contact = new Contact();
        $this->contact->setId($this->faker->text);

        $this->contact->setNom($this->faker->text);

        $this->contact->setPrenom($this->faker->text);

        $this->contact->setFonction($this->faker->text);

        $this->contact->setTelephone($this->faker->text);

        $this->contact->setAdresse($this->faker->text);

        $this->contact->setSiteWebUrl($this->faker->text);

        $this->contact->setCivilite($this->faker->text);

        $this->contact->setSociete($this->faker->text);

        $this->contact->setEmail($this->faker->text);

        $this->contact->setObservations($this->faker->text);
    }

    public function testUnserialize() : void
    {
        $data = [
            'id'           => $this->contact->getId(),
            'nom'          => $this->contact->getNom(),
            'prenom'       => $this->contact->getPrenom(),
            'fonction'     => $this->contact->getFonction(),
            'telephone'    => $this->contact->getTelephone(),
            'adresse'      => $this->contact->getAdresse(),
            'site_web_url' => $this->contact->getSiteWebUrl(),
            'civilite'     => $this->contact->getCivilite(),
            'societe'      => $this->contact->getSociete(),
            'email'        => $this->contact->getEmail(),
            'observations' => $this->contact->getObservations(),
        ];
        $object = Contact::unserialize($data);
        $this->assertInstanceOf(Contact::class, $object);
    }

    public function testgetId() : void
    {
        $id = $this->contact->getId();

        $this->assertIsString($id);

        $this->contact->setId('test id');

        $this->assertSame('test id', $this->contact->getId());
        $this->assertNotSame($id, $this->contact->getId());
    }

    public function testgetNom() : void
    {
        $nom = $this->contact->getNom();

        $this->assertIsString($nom);

        $this->contact->setNom('test nom');

        $this->assertSame('test nom', $this->contact->getNom());
        $this->assertNotSame($nom, $this->contact->getNom());
    }

    public function testgetPrenom() : void
    {
        $prenom = $this->contact->getPrenom();

        $this->assertIsString($prenom);

        $this->contact->setPrenom('test prenom');

        $this->assertSame('test prenom', $this->contact->getPrenom());
        $this->assertNotSame($prenom, $this->contact->getPrenom());
    }

    public function testgetFonction() : void
    {
        $fonction = $this->contact->getFonction();

        $this->assertIsString($fonction);

        $this->contact->setFonction('test fonction');

        $this->assertSame('test fonction', $this->contact->getFonction());
        $this->assertNotSame($fonction, $this->contact->getFonction());
    }

    public function testgetTelephone() : void
    {
        $telephone = $this->contact->getTelephone();

        $this->assertIsString($telephone);

        $this->contact->setTelephone('test telephone');

        $this->assertSame('test telephone', $this->contact->getTelephone());
        $this->assertNotSame($telephone, $this->contact->getTelephone());
    }

    public function testgetAdresse() : void
    {
        $adresse = $this->contact->getAdresse();

        $this->assertIsString($adresse);

        $this->contact->setAdresse('test adresse');

        $this->assertSame('test adresse', $this->contact->getAdresse());
        $this->assertNotSame($adresse, $this->contact->getAdresse());
    }

    public function testgetSiteWebUrl() : void
    {
        $site_web_url = $this->contact->getSiteWebUrl();

        $this->assertIsString($site_web_url);

        $this->contact->setSiteWebUrl('test site_web_url');

        $this->assertSame('test site_web_url', $this->contact->getSiteWebUrl());
        $this->assertNotSame($site_web_url, $this->contact->getSiteWebUrl());
    }

    public function testgetCivilite() : void
    {
        $civilite = $this->contact->getCivilite();

        $this->assertIsString($civilite);

        $this->contact->setCivilite('test civilite');

        $this->assertSame('test civilite', $this->contact->getCivilite());
        $this->assertNotSame($civilite, $this->contact->getCivilite());
    }

    public function testgetSociete() : void
    {
        $societe = $this->contact->getSociete();

        $this->assertIsString($societe);

        $this->contact->setSociete('test societe');

        $this->assertSame('test societe', $this->contact->getSociete());
        $this->assertNotSame($societe, $this->contact->getSociete());
    }

    public function testgetEmail() : void
    {
        $email = $this->contact->getEmail();

        $this->assertIsString($email);

        $this->contact->setEmail('test email');

        $this->assertSame('test email', $this->contact->getEmail());
        $this->assertNotSame($email, $this->contact->getEmail());
    }

    public function testgetObservations() : void
    {
        $observations = $this->contact->getObservations();

        $this->assertIsString($observations);

        $this->contact->setObservations('test observations');

        $this->assertSame('test observations', $this->contact->getObservations());
        $this->assertNotSame($observations, $this->contact->getObservations());
    }
}
