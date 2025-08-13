<?php

namespace Metarisc\Model;

class ObjetUtilisateur extends ModelAbstract
{
    private ?string $avatar_url = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['avatar_url'] */
        $object->setAvatarUrl($data['avatar_url']);

        return $object;
    }

    public function getAvatarUrl() : ?string
    {
        return $this->avatar_url;
    }

    public function setAvatarUrl(string $avatar_url = null) : void
    {
        $this->avatar_url=$avatar_url;
    }
}
