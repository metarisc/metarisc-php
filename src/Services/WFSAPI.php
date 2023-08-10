<?php

namespace Metarisc\Services;

use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class WFSAPI extends MetariscAbstract
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

    public function describFeatureType() : ResponseInterface
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/wfs/DescribeFeatureType');

        return $this->request('GET', $path);
    }

    public function getCapabilities() : ResponseInterface
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/wfs/GetCapabilities');

        return $this->request('GET', $path);
    }

    public function getFeature() : ResponseInterface
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/wfs/GetFeature');

        return $this->request('GET', $path);
    }
}
