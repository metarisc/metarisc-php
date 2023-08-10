<?php

namespace Metarisc\Models;

class PaginateSuiviAdministratif200Response
{
    private ?array $data                                            =null;
    private ?\Metarisc\Models\PaginateDossiers200ResponseMeta $meta = null;
    public function getData() : ?array
    {
        return $this->data;
    }

    public function setData(array $data) : void
    {
        $this->data=$data;
    }

    public function getMeta() : ?PaginateDossiers200ResponseMeta
    {
        return $this->meta;
    }

    public function setMeta(PaginateDossiers200ResponseMeta $meta) : void
    {
        $this->meta=$meta;
    }
}
