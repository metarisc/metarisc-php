<?php

namespace Metarisc\Model;

class Contact
{
    private ?string $id           = null;
    private ?string $nom          = null;
    private ?string $prenom       = null;
    private ?string $fonction     = null;
    private ?string $telephone    = null;
    private ?string $adresse      = null;
    private ?string $site_web_url = null;
    private ?string $civilite     = null;
    private ?string $societe      = null;
    private ?string $email        = null;
    private ?string $observations = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['nom'] */
        $object->setNom($data['nom']);

        /** @var string $data['prenom'] */
        $object->setPrenom($data['prenom']);

        /** @var string $data['fonction'] */
        $object->setFonction($data['fonction']);

        /** @var string $data['telephone'] */
        $object->setTelephone($data['telephone']);

        /** @var string $data['adresse'] */
        $object->setAdresse($data['adresse']);

        /** @var string $data['site_web_url'] */
        $object->setSiteWebUrl($data['site_web_url']);

        /** @var string $data['civilite'] */
        $object->setCivilite($data['civilite']);

        /** @var string $data['societe'] */
        $object->setSociete($data['societe']);

        /** @var string $data['email'] */
        $object->setEmail($data['email']);

        /** @var string $data['observations'] */
        $object->setObservations($data['observations']);

        return $object;
    }

    public function getId() : ?string
    {
        return $this->id;
    }

    public function setId(string $id = null) : void
    {
        $this->id=$id;
    }

    public function getNom() : ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom = null) : void
    {
        $this->nom=$nom;
    }

    public function getPrenom() : ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom = null) : void
    {
        $this->prenom=$prenom;
    }

    public function getFonction() : ?string
    {
        return $this->fonction;
    }

    public function setFonction(string $fonction = null) : void
    {
        $this->fonction=$fonction;
    }

    public function getTelephone() : ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone = null) : void
    {
        $this->telephone=$telephone;
    }

    public function getAdresse() : ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse = null) : void
    {
        $this->adresse=$adresse;
    }

    public function getSiteWebUrl() : ?string
    {
        return $this->site_web_url;
    }

    public function setSiteWebUrl(string $site_web_url = null) : void
    {
        $this->site_web_url=$site_web_url;
    }

    public function getCivilite() : ?string
    {
        return $this->civilite;
    }

    public function setCivilite(string $civilite = null) : void
    {
        $this->civilite=$civilite;
    }

    public function getSociete() : ?string
    {
        return $this->societe;
    }

    public function setSociete(string $societe = null) : void
    {
        $this->societe=$societe;
    }

    public function getEmail() : ?string
    {
        return $this->email;
    }

    public function setEmail(string $email = null) : void
    {
        $this->email=$email;
    }

    public function getObservations() : ?string
    {
        return $this->observations;
    }

    public function setObservations(string $observations = null) : void
    {
        $this->observations=$observations;
    }
}
