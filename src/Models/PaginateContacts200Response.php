<?php

namespace Metarisc\Models;

class PaginateContacts200Response
{
    private ?\Metarisc\Models\PaginatePoi200ResponseMeta $meta = null;
    public function getData() : array
    {
        return $this->data;
    }

    public function setData(array $data)
    {
        $this->data=$data;
    }

    public function getMeta() : ?PaginatePoi200ResponseMeta
    {
        return $this->meta;
    }

    public function setMeta(PaginatePoi200ResponseMeta $meta)
    {
        $this->meta=$meta;
    }
}
