<?php

namespace Metarisc\Model;

class Tag
{
    private ?string $message = null;

    public function getMessage() : ?string
    {
        return $this->message;
    }

    public function setMessage(string $message) : void
    {
        $this->message=$message;
    }
}
