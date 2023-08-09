<?php

namespace Metarisc\Models;

class Ping200Response
{
    private ?string $message = null;
    public function getMessage() : ?string
    {
        return $this->message;
    }

    public function setMessage(string $message)
    {
        $this->message=$message;
    }
}
