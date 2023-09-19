<?php

namespace Metarisc\Model;

class PaginateMoiEmails200ResponseMeta
{
    private ?\Metarisc\Model\PaginateMoiEmails200ResponseMetaPagination $pagination = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var array<array-key, mixed> $data['pagination'] */
        $object->setPagination($data['pagination']);

        return $object;
    }

    public function getPagination() : ?PaginateMoiEmails200ResponseMetaPagination
    {
        return $this->pagination;
    }

    public function setPagination(array $pagination) : void
    {
        $this->pagination=\Metarisc\Model\PaginateMoiEmails200ResponseMetaPagination::unserialize($pagination);
    }
}
