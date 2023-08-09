<?php

namespace Metarisc\Services;

use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class WFSAPI extends MetariscAbstract
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

    public function describFeatureType() : ResponseInterface
    {
        $this->replacement_table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/wfs/DescribeFeatureType');

        return $this->request('GET', $path);
    }

    public function getCapabilities() : ResponseInterface
    {
        $this->replacement_table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/wfs/GetCapabilities');

        return $this->request('GET', $path);
    }

    public function getFeature() : ResponseInterface
    {
        $this->replacement_table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/wfs/GetFeature');

        return $this->request('GET', $path);
    }
}
