<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class ERPAPI extends MetariscAbstract
{
    /**
     * Récupération des détails de l'ERP.
     */
    public function getErp(string $erp_id) : \Metarisc\Model\ERP
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\ERP::unserialize($object);
    }

    /**
     * Récupération de la liste des ERP.
     */
    public function paginateErp() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\ERP::class,
        ]);
    }

    /**
     * Récupération de la liste des contacts d'un ERP.
     */
    public function paginateErpContacts(string $erp_id) : Pagerfanta
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/contacts');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Contact::class,
        ]);
    }

    /**
     * Récupération de la liste des documents d'un ERP.
     */
    public function paginateErpDocuments(string $erp_id) : Pagerfanta
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/documents');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\PieceJointe::class,
        ]);
    }
}
