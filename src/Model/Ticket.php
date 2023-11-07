<?php

namespace Metarisc\Model;

class Ticket
{
    private ?int $id                  = null;
    private ?string $subject          = null;
    private ?string $description      = null;
    private ?string $description_html = null;
    private ?string $status           = null;
    private ?string $created_at       = null;
    private ?string $updated_at       = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var int $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['subject'] */
        $object->setSubject($data['subject']);

        /** @var string $data['description'] */
        $object->setDescription($data['description']);

        /** @var string $data['description_html'] */
        $object->setDescriptionHtml($data['description_html']);

        /** @var string $data['status'] */
        $object->setStatus($data['status']);

        /** @var string $data['created_at'] */
        $object->setCreatedAt($data['created_at']);

        /** @var string $data['updated_at'] */
        $object->setUpdatedAt($data['updated_at']);

        return $object;
    }

    public function getId() : ?int
    {
        return $this->id;
    }

    public function setId(int $id = null) : void
    {
        $this->id=$id;
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

    public function getDescriptionHtml() : ?string
    {
        return $this->description_html;
    }

    public function setDescriptionHtml(string $description_html = null) : void
    {
        $this->description_html=$description_html;
    }

    public function getStatus() : ?string
    {
        return $this->status;
    }

    public function setStatus(string $status = null) : void
    {
        $this->status=$status;
    }

    public function getCreatedAt() : ?string
    {
        return $this->created_at;
    }

    public function setCreatedAt(?string $created_at) : void
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt() : ?string
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?string $updated_at) : void
    {
        $this->updated_at = $updated_at;
    }
}
