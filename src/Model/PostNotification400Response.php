<?php

namespace Metarisc\Model;

class PostNotification400Response extends ModelAbstract
{
    private ?int $status_code = null;
    private ?string $type     = null;
    private ?string $title    = null;
    private ?string $detail   = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var int $data['status_code'] */
        $object->setStatusCode($data['status_code']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        /** @var string $data['title'] */
        $object->setTitle($data['title']);

        /** @var string $data['detail'] */
        $object->setDetail($data['detail']);

        return $object;
    }

    public function getStatusCode() : ?int
    {
        return $this->status_code;
    }

    public function setStatusCode(int $status_code = null) : void
    {
        $this->status_code=$status_code;
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

    public function getDetail() : ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail = null) : void
    {
        $this->detail=$detail;
    }
}
