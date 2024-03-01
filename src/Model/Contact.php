<?php

namespace Metarisc\Model;

class Contact extends ModelAbstract
{
    private ?string $id                 = null;
    private ?string $nom                = null;
    private ?string $prenom             = null;
    private ?string $fonction           = null;
    private ?string $telephone_fixe     = null;
    private ?string $telephone_portable = null;
    private ?string $telephone_fax      = null;
    private ?string $adresse            = null;
    private ?string $site_web_url       = null;
    private ?string $civilite           = null;
    private ?string $societe            = null;
    private ?string $email              = null;
    private ?string $observations       = null;

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

        /** @var string $data['telephone_fixe'] */
        $object->setTelephoneFixe($data['telephone_fixe']);

        /** @var string $data['telephone_portable'] */
        $object->setTelephonePortable($data['telephone_portable']);

        /** @var string $data['telephone_fax'] */
        $object->setTelephoneFax($data['telephone_fax']);

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

    public function getTelephoneFixe() : ?string
    {
        return $this->telephone_fixe;
    }

    public function setTelephoneFixe(string $telephone_fixe = null) : void
    {
        $this->telephone_fixe=$telephone_fixe;
    }

    public function getTelephonePortable() : ?string
    {
        return $this->telephone_portable;
    }

    public function setTelephonePortable(string $telephone_portable = null) : void
    {
        $this->telephone_portable=$telephone_portable;
    }

    public function getTelephoneFax() : ?string
    {
        return $this->telephone_fax;
    }

    public function setTelephoneFax(string $telephone_fax = null) : void
    {
        $this->telephone_fax=$telephone_fax;
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
