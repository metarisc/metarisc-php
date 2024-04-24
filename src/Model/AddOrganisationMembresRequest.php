<?php

namespace Metarisc\Model;

class AddOrganisationMembresRequest extends ModelAbstract
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
