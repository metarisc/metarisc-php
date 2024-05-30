<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class DocumentsAPI extends MetariscAbstract
{
    /**
     * Suppression d'un document existant.
     */
    public function deleteDocument(string $document_id) : void
    {
        $table = [
            'document_id' => $document_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/documents/{document_id}');
        $this->request('DELETE', $path);
    }

    /**
     * Récupération d'un document.
     */
    public function getDocument(string $document_id) : \Metarisc\Model\PieceJointe
    {
        $table = [
            'document_id' => $document_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/documents/{document_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\PieceJointe::unserialize($object);
    }

    /**
     * Récupération de la liste des documents.
     */
    public function paginate() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/documents');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\PieceJointe::class,
        ]);
    }

    /**
     * Mise à jour d'un document existant.
     */
    public function postDocument(string $document_id, \Metarisc\Model\PieceJointe $piece_jointe = null) : void
    {
        $table = [
            'document_id' => $document_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/documents/{document_id}');

        $this->request('POST', $path, [
            'json' => [
                'id'          => $piece_jointe?->getId(),
                'url'         => $piece_jointe?->getUrl(),
                'nom'         => $piece_jointe?->getNom(),
                'description' => $piece_jointe?->getDescription(),
                'type'        => $piece_jointe?->getType(),
            ],
        ]);
    }
}
