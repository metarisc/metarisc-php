<?php

namespace Metarisc\Model;

/*
 * Email associé à un utilisateur Metarisc.
*/

class Email extends ModelAbstract
{
    private ?string $email             = null;
    private ?bool $is_primary          = null;
    private ?bool $is_publicly_visible = null;
    private ?bool $is_verified         = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['email'] */
        $object->setEmail($data['email']);

        /** @var bool $data['is_primary'] */
        $object->setIsPrimary($data['is_primary']);

        /** @var bool $data['is_publicly_visible'] */
        $object->setIsPubliclyVisible($data['is_publicly_visible']);

        /** @var bool $data['is_verified'] */
        $object->setIsVerified($data['is_verified']);

        return $object;
    }

    public function getEmail() : ?string
    {
        return $this->email;
    }

    public function setEmail(string $email = null) : void
    {
        $this->email=$email;
    }

    public function getIsPrimary() : ?bool
    {
        return $this->is_primary;
    }

    public function setIsPrimary(bool $is_primary = null) : void
    {
        $this->is_primary=$is_primary;
    }

    public function getIsPubliclyVisible() : ?bool
    {
        return $this->is_publicly_visible;
    }

    public function setIsPubliclyVisible(bool $is_publicly_visible = null) : void
    {
        $this->is_publicly_visible=$is_publicly_visible;
    }

    public function getIsVerified() : ?bool
    {
        return $this->is_verified;
    }

    public function setIsVerified(bool $is_verified = null) : void
    {
        $this->is_verified=$is_verified;
    }
}
