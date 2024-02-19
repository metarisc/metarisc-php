<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class PEIAPI extends MetariscAbstract
{
    /**
     * Récupération de l'ensemble des données d'un PEI.
     */
    public function getPei(string $pei_id) : \Metarisc\Model\PEI
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\PEI::unserialize($object);
    }

    /**
     * Récupération de la liste des Points d'Eau Incendie (PEI) selon des critères de recherche.
     */
    public function paginatePei() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\PEI::class,
        ]);
    }

    /**
     * Récupération de la liste des contacts d'un Point d'Eau Incendie.
     */
    public function paginatePeiContacts(string $pei_id) : Pagerfanta
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/contacts');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Contact::class,
        ]);
    }

    /**
     * Récupération de l'historique d'un POI.
     */
    public function paginatePeiHistorique(string $pei_id) : Pagerfanta
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/historique');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\DescriptifTechniqueDECI::class,
        ]);
    }

    /**
     * Récupération de la liste des pièces jointes d'un Point d'Eau Incendie.
     */
    public function paginatePeiPiecesJointes(string $pei_id) : Pagerfanta
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/pieces_jointes');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\PieceJointe::class,
        ]);
    }
}
