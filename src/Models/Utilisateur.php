<?php

namespace Metarisc\Models;

class Utilisateur
{
    private ?string $id            = null;
    private ?string $first_name    = null;
    private ?string $last_name     = null;
    private ?\DateTime $created_at = null;
    private ?\DateTime $updated_at = null;
    private ?string $timezone      = null;
    private ?bool $is_active       = null;
    private ?bool $is_verified     = null;
    public function getId() : ?string
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id=$id;
    }

    public function getFirstName() : ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name)
    {
        $this->first_name=$first_name;
    }

    public function getLastName() : ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name)
    {
        $this->last_name=$last_name;
    }

    public function getCreatedAt() : ?\DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTime $created_at)
    {
        $this->created_at=$created_at;
    }

    public function getUpdatedAt() : ?\DateTime
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTime $updated_at)
    {
        $this->updated_at=$updated_at;
    }

    public function getTimezone() : ?string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone)
    {
        $this->timezone=$timezone;
    }

    public function getIsActive() : ?bool
    {
        return $this->is_active;
    }

    public function setIsActive(bool $is_active)
    {
        $this->is_active=$is_active;
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
