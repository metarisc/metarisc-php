<?php

namespace Metarisc\Model;

class GetFeature200ResponseCrsProperties
{
    private ?string $name = null;

    public function getName() : ?string
    {
        return $this->name;
    }

    public function setName(string $name) : void
    {
        $this->name=$name;
    }
}
