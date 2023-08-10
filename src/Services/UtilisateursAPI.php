<?php

namespace Metarisc\Services;

use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class UtilisateursAPI extends MetariscAbstract
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

    public function getUtilisateursMoi() : ResponseInterface
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/@moi');

        return $this->request('GET', $path);
    }

    public function getUtilisateursMoi1() : ResponseInterface
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/utilisateurs/@moi');

        return $this->request('GET', $path);
    }

    public function paginateMoiEmails(string $page = null, string $per_page = null) : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/@moi/emails');

        return $this->pagination('GET', $path, [
            'params' => [
                'page'     => $page,
                'per_page' => $per_page, ],
        ]);
    }

    public function paginateMoiEmails1(string $page = null, string $per_page = null) : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/utilisateurs/@moi/emails');

        return $this->pagination('GET', $path, [
            'params' => [
                'page'     => $page,
                'per_page' => $per_page, ],
        ]);
    }
}
