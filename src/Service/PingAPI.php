<?php

namespace Metarisc\Service;

use Metarisc\MetariscAbstract;

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
    public function ping() : \Metarisc\Model\Ping200Response
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/ping');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\Ping200Response::unserialize($object);
    }
}
