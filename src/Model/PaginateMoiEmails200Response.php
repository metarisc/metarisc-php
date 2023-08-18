<?php

namespace Metarisc\Model;

class PaginateMoiEmails200Response
{
    private ?array $data                                            = null;
    private ?\Metarisc\Model\PaginateMoiEmails200ResponseMeta $meta = null;

    public function getData() : ?array
    {
        return $this->data;
    }

    public function setData(array $data) : void
    {
        $this->data=$data;
    }

    public function getMeta() : ?PaginateMoiEmails200ResponseMeta
    {
        return $this->meta;
    }

    public function setMeta(PaginateMoiEmails200ResponseMeta $meta) : void
    {
        $this->meta=$meta;
    }
}
