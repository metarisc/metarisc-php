<?php

namespace Metarisc\Services;

use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class OrganisationAPI extends MetariscAbstract
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

    public function getOrganisation(string $org_id) : ResponseInterface
    {
        $table = [
            'org_id' => $org_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/organisations/{org_id}');

        return $this->request('GET', $path);
    }
}
