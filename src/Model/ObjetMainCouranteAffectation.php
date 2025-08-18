<?php

namespace Metarisc\Model;

/*
 * Liaison entre une main courante et un utilisateur. Vous pouvez affecter plusieurs personnes à la main courante, y compris vous-même.
*/

class ObjetMainCouranteAffectation extends ModelAbstract
{
    private ?string $utilisateur_id = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['utilisateur_id'] */
        $object->setUtilisateurId($data['utilisateur_id']);

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
}
