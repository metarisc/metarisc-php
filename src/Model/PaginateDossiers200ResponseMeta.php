<?php

namespace Metarisc\Model;

class PaginateDossiers200ResponseMeta
{
    private ?\Metarisc\Model\PaginationMetadata1 $pagination = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var array<array-key, mixed> $data['pagination'] */
        $object->setPagination($data['pagination']);

        return $object;
    }

    public function getPagination() : ?PaginationMetadata1
    {
        return $this->pagination;
    }

    public function setPagination(array $pagination) : void
    {
        $this->pagination=\Metarisc\Model\PaginationMetadata1::unserialize($pagination);
    }
}
