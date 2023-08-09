<?php

namespace Metarisc\Models;

class PaginateNotifications200Response
{
    private ?\Metarisc\Models\PaginateMoiEmails200ResponseMeta $meta = null;
    public function getData() : array
    {
        return $this->data;
    }

    public function setData(array $data)
    {
        $this->data=$data;
    }

    public function getMeta() : ?PaginateMoiEmails200ResponseMeta
    {
        return $this->meta;
    }

    public function setMeta(PaginateMoiEmails200ResponseMeta $meta)
    {
        $this->meta=$meta;
    }
}
