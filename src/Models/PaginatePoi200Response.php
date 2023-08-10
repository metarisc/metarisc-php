<?php

namespace Metarisc\Models;

class PaginatePoi200Response
{
    private ?array $data                                       =null;
    private ?\Metarisc\Models\PaginatePoi200ResponseMeta $meta = null;
    public function getData() : ?array
    {
        return $this->data;
    }

    public function setData(array $data) : void
    {
        $this->data=$data;
    }

    public function getMeta() : ?PaginatePoi200ResponseMeta
    {
        return $this->meta;
    }

    public function setMeta(PaginatePoi200ResponseMeta $meta) : void
    {
        $this->meta=$meta;
    }
}
