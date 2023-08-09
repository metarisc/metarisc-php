<?php

namespace Metarisc\Services;

use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class PingAPI extends MetariscAbstract
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

    public function ping() : ResponseInterface
    {
        $this->replacement_table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/ping');

        return $this->request('GET', $path);
    }
}
