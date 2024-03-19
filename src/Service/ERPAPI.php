<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Metarisc\MetariscAbstract;

class ERPAPI extends MetariscAbstract
{
    /**
     * Récupération de la liste des ERP.
     */
    public function paginateErp(int $page = null, int $per_page = null) : \Metarisc\Model\PaginateErp200Response
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\PaginateErp200Response::unserialize($object);
    }
}
