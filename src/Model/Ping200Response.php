<?php

namespace Metarisc\Model;

class Ping200Response
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
