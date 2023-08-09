<?php

namespace Metarisc\Services;

use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class POIAPI extends MetariscAbstract
{
    private array $replacement_table;

    protected function replacements() : \Closure
    {
        $table = $this->replacement_table;

        return function ($matches) use ($table) {
            $param = $matches[1];
            if (isset($table[$param])) {
                return $table[$param];
            } else {
                return $matches;
            }
        };
    }

    public function getPoi($poi_id) : ResponseInterface
    {
        $this->replacement_table = [
            'poi_id' => $poi_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/poi/{poi_id}');

        return $this->request('GET', $path);
    }

    public function paginateContacts($poi_id) : Pagerfanta
    {
        $this->replacement_table = [
            'poi_id' => $poi_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/poi/{poi_id}/contacts');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }

    public function paginateHistorique($poi_id) : Pagerfanta
    {
        $this->replacement_table = [
            'poi_id' => $poi_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/poi/{poi_id}/historique');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }

    public function paginatePiecesJointes($poi_id) : Pagerfanta
    {
        $this->replacement_table = [
            'poi_id' => $poi_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/poi/{poi_id}/pieces_jointes');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }

    public function paginatePoi() : Pagerfanta
    {
        $this->replacement_table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/poi/');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }

    public function patchPoi($poi_id) : ResponseInterface
    {
        $this->replacement_table = [
            'poi_id' => $poi_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/poi/{poi_id}');

        return $this->request('PATCH', $path);
    }
}
