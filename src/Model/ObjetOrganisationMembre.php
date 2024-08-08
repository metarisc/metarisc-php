<?php

namespace Metarisc\Model;

/*
 * Représente un membre d'une organisation.
*/

class ObjetOrganisationMembre extends ModelAbstract
{
    private ?string $utilisateur_id = null;
    private ?string $role           = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['utilisateur_id'] */
        $object->setUtilisateurId($data['utilisateur_id']);

        /** @var string $data['role'] */
        $object->setRole($data['role']);

        return $object;
    }

    public function getUtilisateurId() : ?string
    {
        return $this->utilisateur_id;
    }

    public function setUtilisateurId(string $utilisateur_id = null) : void
    {
        $this->utilisateur_id=$utilisateur_id;
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
