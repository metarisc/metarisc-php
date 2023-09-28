<?php

namespace Metarisc\Model;

class PaginateEvenements200ResponseMeta
{
    private ?\Metarisc\Model\PaginationMetadata2 $pagination = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var array<array-key, mixed> $data['pagination'] */
        $object->setPagination($data['pagination']);

        return $object;
    }

    public function getPagination() : ?PaginationMetadata2
    {
        return $this->pagination;
    }

    public function setPagination(array $pagination) : void
    {
        $this->pagination=\Metarisc\Model\PaginationMetadata2::unserialize($pagination);
    }
}
