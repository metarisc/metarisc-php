<?php

namespace Metarisc\Service;

use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class PingAPI extends MetariscAbstract
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

    /**
     * Permet de s'assurer que le service Metarisc est en ligne. Ping ... Pong !
     */
    public function ping() : ResponseInterface
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/ping');

        return $this->request('GET', $path);
    }
}
