<?php

namespace Metarisc\Model;

/*
 * Les tags sont des mots-clés permettant de classifier un objet.
*/

class Tag extends ModelAbstract
{
    private ?string $message = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['message'] */
        $object->setMessage($data['message']);

        return $object;
    }

    public function getMessage() : ?string
    {
        return $this->message;
    }

    public function setMessage(string $message = null) : void
    {
        $this->message=$message;
    }
}
