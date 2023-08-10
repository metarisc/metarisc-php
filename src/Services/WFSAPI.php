<?php

namespace Metarisc\Services;

use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class WFSAPI extends MetariscAbstract
{
    protected function replacements(array $replacement_table) : \Closure
    {
        return function (string $matches) use ($replacement_table) {
            $param = $matches[1];
            if (isset($replacement_table[$param])) {
                return $replacement_table[$param];
            } else {
                return $matches;
            }
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
