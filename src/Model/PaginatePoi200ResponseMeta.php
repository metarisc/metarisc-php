<?php

namespace Metarisc\Model;

class PaginatePoi200ResponseMeta
{
    private ?\Metarisc\Model\PaginationMetadata2 $pagination = null;

    public function getPagination() : ?PaginationMetadata2
    {
        return $this->pagination;
    }

    public function setPagination(PaginationMetadata2 $pagination) : void
    {
        $this->pagination=$pagination;
    }
}
