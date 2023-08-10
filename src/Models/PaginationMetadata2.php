<?php

namespace Metarisc\Models;

class PaginationMetadata2
{
    private ?int $total        = null;
    private ?int $count        = null;
    private ?int $per_page     = null;
    private ?int $current_page = null;
    private ?int $total_pages  = null;
    public function getTotal() : ?int
    {
        return $this->total;
    }

    public function setTotal(int $total) : void
    {
        $this->total=$total;
    }

    public function getCount() : ?int
    {
        return $this->count;
    }

    public function setCount(int $count) : void
    {
        $this->count=$count;
    }

    public function getPerPage() : ?int
    {
        return $this->per_page;
    }

    public function setPerPage(int $per_page) : void
    {
        $this->per_page=$per_page;
    }

    public function getCurrentPage() : ?int
    {
        return $this->current_page;
    }

    public function setCurrentPage(int $current_page) : void
    {
        $this->current_page=$current_page;
    }

    public function getTotalPages() : ?int
    {
        return $this->total_pages;
    }

    public function setTotalPages(int $total_pages) : void
    {
        $this->total_pages=$total_pages;
    }
}
