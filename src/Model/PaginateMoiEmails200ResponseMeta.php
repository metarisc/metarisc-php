<?php

namespace Metarisc\Model;

class PaginateMoiEmails200ResponseMeta
{
    private ?\Metarisc\Model\PaginateMoiEmails200ResponseMetaPagination $pagination = null;

    public function getPagination() : ?PaginateMoiEmails200ResponseMetaPagination
    {
        return $this->pagination;
    }

    public function setPagination(PaginateMoiEmails200ResponseMetaPagination $pagination) : void
    {
        $this->pagination=$pagination;
    }
}
