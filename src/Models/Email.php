<?php

namespace Metarisc\Models;

class Email
{
    private ?string $email             = null;
    private ?bool $is_primary          = null;
    private ?bool $is_publicly_visible = null;
    private ?bool $is_verified         = null;
    public function getEmail() : ?string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email=$email;
    }

    public function getIsPrimary() : ?bool
    {
        return $this->is_primary;
    }

    public function setIsPrimary(bool $is_primary)
    {
        $this->is_primary=$is_primary;
    }

    public function getIsPubliclyVisible() : ?bool
    {
        return $this->is_publicly_visible;
    }

    public function setIsPubliclyVisible(bool $is_publicly_visible)
    {
        $this->is_publicly_visible=$is_publicly_visible;
    }

    public function getIsVerified() : ?bool
    {
        return $this->is_verified;
    }

    public function setIsVerified(bool $is_verified)
    {
        $this->is_verified=$is_verified;
    }
}
