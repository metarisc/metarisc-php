<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class OrganisationAPI extends MetariscAbstract
{
    /**
     * Récupération des détails d'une organisation.
     */
    public function getOrganisation(string $org_id) : \Metarisc\Model\Organisation
    {
        $table = [
            'org_id' => $org_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/organisations/{org_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\Organisation::unserialize($object);
    }

    /**
     * Liste paginée des organisations.
     */
    public function paginateOrganisations() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/organisations/');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Organisation::class,
        ]);
    }
}
