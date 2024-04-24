<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class OrganisationsAPI extends MetariscAbstract
{
    /**
     * Ajout d'un utilisateur comme membre dans une organisation.
     */
    public function addOrganisationMembres(string $org_id, \Metarisc\Model\AddOrganisationMembresRequest $add_organisation_membres_request = null) : void
    {
        $table = [
            'org_id' => $org_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/organisations/{org_id}/membres');

        $this->request('POST', $path, [
            'json' => [
                'utilisateur_id' => $add_organisation_membres_request?->getUtilisateurId(),
            ],
        ]);
    }

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
     * Ensemble de règles utilisées pour le calcul de la conformité et de la performance DECI.
     */
    public function getOrganisationReglesDeci(string $org_id) : \Metarisc\Model\GetOrganisationReglesDeci200Response
    {
        $table = [
            'org_id' => $org_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/organisations/{org_id}/regles-deci');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\GetOrganisationReglesDeci200Response::unserialize($object);
    }

    /**
     * Retourne le référentiel du paramétrage des workflows pour l'organisation.
     */
    public function paginateOrganisationDossiersWorkflowsSuites(string $org_id) : Pagerfanta
    {
        $table = [
            'org_id' => $org_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/organisations/{org_id}/dossiers-workflows-suites');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\WorkflowType::class,
        ]);
    }

    /**
     * Récupération de la liste des géo-services d'une organisation.
     */
    public function paginateOrganisationGeoservices(string $org_id) : Pagerfanta
    {
        $table = [
            'org_id' => $org_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/organisations/{org_id}/geoservices');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\OrganisationGeoservice::class,
        ]);
    }

    /**
     * Récupération de la liste des membres d'une organisation.
     */
    public function paginateOrganisationMembres(string $org_id) : Pagerfanta
    {
        $table = [
            'org_id' => $org_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/organisations/{org_id}/membres');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\OrganisationMembre::class,
        ]);
    }

    /**
     * Liste paginée des organisations.
     */
    public function paginateOrganisations() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/organisations');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Organisation::class,
        ]);
    }
}
