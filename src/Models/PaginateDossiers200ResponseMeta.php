<?php

namespace Metarisc\Models;

class PaginateDossiers200ResponseMeta
{
    private ?\Metarisc\Models\PaginationMetadata1 $pagination = null;
    public function getPagination() : ?PaginationMetadata1
    {
        return $this->pagination;
    }

    public function setPagination(PaginationMetadata1 $pagination)
    {
        $this->pagination=$pagination;
    }
}
