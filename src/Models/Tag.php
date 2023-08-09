<?php

namespace Metarisc\Models;

class Tag
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
