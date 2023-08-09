<?php

namespace Metarisc\Services;

use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class OrganisationAPI extends MetariscAbstract
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

    public function getOrganisation($org_id) : ResponseInterface
    {
        $this->replacement_table = [
            'org_id' => $org_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/organisations/{org_id}');

        return $this->request('GET', $path);
    }
}
