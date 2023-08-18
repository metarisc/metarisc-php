<?php

namespace Metarisc\Service;

use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class OrganisationAPI extends MetariscAbstract
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
     * Récupération des détails d'une organisation.
     */
    public function getOrganisation(string $org_id) : ResponseInterface
    {
        $table = [
            'org_id' => $org_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/organisations/{org_id}');

        return $this->request('GET', $path);
    }
}
