<?php

namespace Metarisc\Model;

/*
 * Liaison entre une main courante et un utilisateur. Vous pouvez affecter plusieurs personnes à la main courante, y compris vous-même.
*/

class MainCouranteParticipation extends ModelAbstract
{
    private ?string $id                               = null;
    private ?\Metarisc\Model\Utilisateur $utilisateur = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

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

    public function getUtilisateur() : ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(array $utilisateur) : void
    {
        $this->utilisateur=Utilisateur::unserialize($utilisateur);
    }
}
