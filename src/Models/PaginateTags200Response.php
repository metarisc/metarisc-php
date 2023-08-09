<?php

namespace Metarisc\Models;

class PaginateTags200Response
{
    private ?\Metarisc\Models\PaginateDossiers200ResponseMeta $meta = null;
    public function getData() : array
    {
        return $this->data;
    }

    public function setData(array $data)
    {
        $this->data=$data;
    }

    public function getMeta() : ?PaginateDossiers200ResponseMeta
    {
        return $this->meta;
    }

    public function setMeta(PaginateDossiers200ResponseMeta $meta)
    {
        $this->meta=$meta;
    }
}
