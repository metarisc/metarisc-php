<?php

namespace Metarisc\Services;

use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class UtilisateursAPI extends MetariscAbstract
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

    public function getUtilisateursMoi() : ResponseInterface
    {
        $this->replacement_table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/@moi');

        return $this->request('GET', $path);
    }

    public function getUtilisateursMoi1() : ResponseInterface
    {
        $this->replacement_table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/utilisateurs/@moi');

        return $this->request('GET', $path);
    }

    public function paginateMoiEmails($page = null, $per_page = null) : Pagerfanta
    {
        $this->replacement_table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/@moi/emails');

        return $this->pagination('GET', $path, [
            'params' => [
                'page'     => $page,
                'per_page' => $per_page, ],
        ]);
    }

    public function paginateMoiEmails1($page = null, $per_page = null) : Pagerfanta
    {
        $this->replacement_table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/utilisateurs/@moi/emails');

        return $this->pagination('GET', $path, [
            'params' => [
                'page'     => $page,
                'per_page' => $per_page, ],
        ]);
    }
}
