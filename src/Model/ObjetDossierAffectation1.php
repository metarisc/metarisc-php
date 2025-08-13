<?php

namespace Metarisc\Model;

/*
 * Liaison entre un dossier et un utilisateur. Vous pouvez affecter plusieurs personnes au dossier, y compris vous-même. Cela permet de débloquer des droits spécifiques sur le traitement du dossier.
*/

class ObjetDossierAffectation1 extends ModelAbstract
{
    private ?string $role = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['role'] */
        $object->setRole($data['role']);

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
}
