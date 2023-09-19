<?php

namespace Metarisc\Model;

class PaginationMetadata1
{
    private ?int $total        = null;
    private ?int $count        = null;
    private ?int $per_page     = null;
    private ?int $current_page = null;
    private ?int $total_pages  = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var int $data['total'] */
        $object->setTotal($data['total']);

        /** @var int $data['count'] */
        $object->setCount($data['count']);

        /** @var int $data['per_page'] */
        $object->setPerPage($data['per_page']);

        /** @var int $data['current_page'] */
        $object->setCurrentPage($data['current_page']);

        /** @var int $data['total_pages'] */
        $object->setTotalPages($data['total_pages']);

        return $object;
    }

    public function getTotal() : ?int
    {
        return $this->total;
    }

    public function setTotal(int $total = null) : void
    {
        $this->total=$total;
    }

    public function getCount() : ?int
    {
        return $this->count;
    }

    public function setCount(int $count = null) : void
    {
        $this->count=$count;
    }

    public function getPerPage() : ?int
    {
        return $this->per_page;
    }

    public function setPerPage(int $per_page = null) : void
    {
        $this->per_page=$per_page;
    }

    public function getCurrentPage() : ?int
    {
        return $this->current_page;
    }

    public function setCurrentPage(int $current_page = null) : void
    {
        $this->current_page=$current_page;
    }

    public function getTotalPages() : ?int
    {
        return $this->total_pages;
    }

    public function setTotalPages(int $total_pages = null) : void
    {
        $this->total_pages=$total_pages;
    }
}
