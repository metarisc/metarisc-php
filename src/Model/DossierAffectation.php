<?php

namespace Metarisc\Model;

/*
 * Liaison entre un dossier et un utilisateur. Vous pouvez affecter plusieurs personnes au dossier, y compris vous-même. Cela permet de débloquer des droits spécifiques sur le traitement du dossier.
*/

class DossierAffectation extends ModelAbstract
{
    private ?string $id                               = null;
    private ?string $role                             = null;
    private ?\Metarisc\Model\Utilisateur $utilisateur = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['role'] */
        $object->setRole($data['role']);

        /** @var array<array-key, mixed> $data['utilisateur'] */
        $object->setUtilisateur($data['utilisateur']);

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

    public function getRole() : ?string
    {
        return $this->role;
    }

    public function setRole(string $role = null) : void
    {
        $this->role=$role;
    }

    public function getUtilisateur() : ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(array $utilisateur) : void
    {
        $this->utilisateur=Utilisateur::unserialize($utilisateur);
    }
}
