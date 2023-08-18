<?php

namespace Metarisc\Model;

class PaginateDossiers200ResponseMeta
{
    private ?\Metarisc\Model\PaginationMetadata1 $pagination = null;

    public function getPagination() : ?PaginationMetadata1
    {
        return $this->pagination;
    }

    public function setPagination(PaginationMetadata1 $pagination) : void
    {
        $this->pagination=$pagination;
    }
}
