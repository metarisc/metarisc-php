<?php

namespace Metarisc\Model;

/*
 * Liaison entre un dossier et un utilisateur. Vous pouvez affecter plusieurs personnes au dossier, y compris vous-même. Cela permet de débloquer des droits spécifiques sur le traitement du dossier.
*/

class ObjetDossierAffectation extends ModelAbstract
{
    private ?string $role           = null;
    private ?string $utilisateur_id = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['role'] */
        $object->setRole($data['role']);

        /** @var string $data['utilisateur_id'] */
        $object->setUtilisateurId($data['utilisateur_id']);

        return $object;
    }

    public function getRole() : ?string
    {
        return $this->role;
    }

    public function setRole(string $role = null) : void
    {
        $this->role=$role;
    }

    public function getUtilisateurId() : ?string
    {
        return $this->utilisateur_id;
    }

    public function setUtilisateurId(string $utilisateur_id = null) : void
    {
        $this->utilisateur_id=$utilisateur_id;
    }
}
