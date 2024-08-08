<?php

namespace Metarisc\Model;

/*
 * Représente un membre d'une organisation.
*/

class OrganisationMembre extends ModelAbstract
{
    private ?\Metarisc\Model\Organisation $organisation = null;
    private ?\Metarisc\Model\Utilisateur $utilisateur   = null;
    private ?string $date_integration                   = null;
    private ?string $role                               = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var array<array-key, mixed> $data['organisation'] */
        $object->setOrganisation($data['organisation']);

        /** @var array<array-key, mixed> $data['utilisateur'] */
        $object->setUtilisateur($data['utilisateur']);

        /** @var string $data['date_integration'] */
        $object->setDateIntegration($data['date_integration']);

        /** @var string $data['role'] */
        $object->setRole($data['role']);

        return $object;
    }

    public function getOrganisation() : ?Organisation
    {
        return $this->organisation;
    }

    public function setOrganisation(array $organisation) : void
    {
        $this->organisation=Organisation::unserialize($organisation);
    }

    public function getUtilisateur() : ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(array $utilisateur) : void
    {
        $this->utilisateur=Utilisateur::unserialize($utilisateur);
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
