<?php

namespace Metarisc\Model;

class OrganisationMembre extends ModelAbstract
{
    private ?string $organisation_id  = null;
    private ?string $utilisateur_id   = null;
    private ?string $date_integration = null;
    private ?string $role             = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['organisation_id'] */
        $object->setOrganisationId($data['organisation_id']);

        /** @var string $data['utilisateur_id'] */
        $object->setUtilisateurId($data['utilisateur_id']);

        /** @var string $data['date_integration'] */
        $object->setDateIntegration($data['date_integration']);

        /** @var string $data['role'] */
        $object->setRole($data['role']);

        return $object;
    }

    public function getOrganisationId() : ?string
    {
        return $this->organisation_id;
    }

    public function setOrganisationId(string $organisation_id = null) : void
    {
        $this->organisation_id=$organisation_id;
    }

    public function getUtilisateurId() : ?string
    {
        return $this->utilisateur_id;
    }

    public function setUtilisateurId(string $utilisateur_id = null) : void
    {
        $this->utilisateur_id=$utilisateur_id;
    }

    public function getDateIntegration() : ?string
    {
        return $this->date_integration;
    }

    public function setDateIntegration(?string $date_integration) : void
    {
        $this->date_integration = $date_integration;
    }

    public function getRole() : ?string
    {
        return $this->role;
    }

    public function setRole(string $role = null) : void
    {
        $this->role=$role;
    }
}
