<?php

namespace Metarisc\Model;

class PostTicketRequest extends ModelAbstract
{
    private ?string $subject     = null;
    private ?string $description = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['subject'] */
        $object->setSubject($data['subject']);

        /** @var string $data['description'] */
        $object->setDescription($data['description']);

        return $object;
    }

    public function getSubject() : ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject = null) : void
    {
        $this->subject=$subject;
    }

    public function getDescription() : ?string
    {
        return $this->description;
    }

    public function setDescription(string $description = null) : void
    {
        $this->description=$description;
    }
}
