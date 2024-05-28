<?php

namespace Metarisc\Model;

/*
 * Un objet commun Error (RFC 7807).
*/

class Error extends ModelAbstract
{
    private ?string $type   = null;
    private ?string $title  = null;
    private ?int $status    = null;
    private ?string $detail = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var string $data['title'] */
        $object->setTitle($data['title']);

        /** @var int $data['status'] */
        $object->setStatus($data['status']);

        /** @var string $data['detail'] */
        $object->setDetail($data['detail']);

        return $object;
    }

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
    }

    public function getTitle() : ?string
    {
        return $this->title;
    }

    public function setTitle(string $title = null) : void
    {
        $this->title=$title;
    }

    public function getStatus() : ?int
    {
        return $this->status;
    }

    public function setStatus(int $status = null) : void
    {
        $this->status=$status;
    }

    public function getDetail() : ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail = null) : void
    {
        $this->detail=$detail;
    }
}
