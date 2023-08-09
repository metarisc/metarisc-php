<?php

namespace Metarisc\Models;

class PostNotification500Response
{
    private ?int $status_code = null;
    private ?string $type     = null;
    private ?string $title    = null;
    private ?string $detail   = null;
    public function getStatusCode() : ?int
    {
        return $this->status_code;
    }

    public function setStatusCode(int $status_code)
    {
        $this->status_code=$status_code;
    }

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type=$type;
    }

    public function getTitle() : ?string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title=$title;
    }

    public function getDetail() : ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail)
    {
        $this->detail=$detail;
    }
}
