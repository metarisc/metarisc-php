<?php

namespace Metarisc\Model;

class PaginateMoiEmails200Response
{
    private ?array $data                                            = null;
    private ?\Metarisc\Model\PaginateMoiEmails200ResponseMeta $meta = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var \Metarisc\Model\Email[] $data['data'] */
        $object->setData($data['data']);

        /** @var array<array-key, mixed> $data['meta'] */
        $object->setMeta($data['meta']);

        return $object;
    }

    public function getData() : ?array
    {
        return $this->data;
    }

    public function setData(array $data = null) : void
    {
        $this->data=$data;
    }

    public function getMeta() : ?PaginateMoiEmails200ResponseMeta
    {
        return $this->meta;
    }

    public function setMeta(array $meta) : void
    {
        $this->meta=\Metarisc\Model\PaginateMoiEmails200ResponseMeta::unserialize($meta);
    }
}
