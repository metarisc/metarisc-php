<?php

namespace Metarisc\Services;

use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class POIAPI extends MetariscAbstract
{
    protected function replacements(array $replacement_table) : \Closure
    {
        return function (array $matches) use ($replacement_table) : string {
            /** @var array-key $key */
            $key = $matches[1];
            /** @var string $replacement */
            $replacement = $replacement_table[$key] ?? $matches[0];

            return $replacement;
        };
    }

    public function getPoi(string $poi_id) : ResponseInterface
    {
        $table = [
            'poi_id' => $poi_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/poi/{poi_id}');

        return $this->request('GET', $path);
    }

    public function paginateContacts(string $poi_id) : Pagerfanta
    {
        $table = [
            'poi_id' => $poi_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/poi/{poi_id}/contacts');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }

    public function paginateHistorique(string $poi_id) : Pagerfanta
    {
        $table = [
            'poi_id' => $poi_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/poi/{poi_id}/historique');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }

    public function paginatePiecesJointes(string $poi_id) : Pagerfanta
    {
        $table = [
            'poi_id' => $poi_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/poi/{poi_id}/pieces_jointes');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }

    public function paginatePoi() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/poi/');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }

    public function patchPoi(string $poi_id) : ResponseInterface
    {
        $table = [
            'poi_id' => $poi_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/poi/{poi_id}');

        return $this->request('PATCH', $path);
    }
}
