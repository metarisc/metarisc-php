<?php

namespace Metarisc\Models;

class PaginateMoiEmails200ResponseMeta
{
    private ?\Metarisc\Models\PaginateMoiEmails200ResponseMetaPagination $pagination = null;
    public function getPagination() : ?PaginateMoiEmails200ResponseMetaPagination
    {
        return $this->pagination;
    }

    public function setPagination(PaginateMoiEmails200ResponseMetaPagination $pagination)
    {
        $this->pagination=$pagination;
    }
}
