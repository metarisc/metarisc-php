<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class OrganisationsAPI extends MetariscAbstract
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
     * Ensemble des permissions de l'utilisateur connecté sur l'organisation.
     */
    public function getPermissionsOrg(string $org_id) : \Metarisc\Model\GetPermissionsOrgOrganisations200Response
    {
        $table = [
            'org_id' => $org_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/organisations/{org_id}/permissions');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\GetPermissionsOrgOrganisations200Response::unserialize($object);
    }

    /**
     * Ensemble des paramétrages et des configurations liés aux règles métiers de l'organisation.
     */
    public function getOrganisationPreferences(string $org_id) : \Metarisc\Model\OrganisationPreferences
    {
        $table = [
            'org_id' => $org_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/organisations/{org_id}/preferences');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\OrganisationPreferences::unserialize($object);
    }

    /**
     * Ensemble de règles utilisées pour le calcul de la conformité et de la performance DECI.
     */
    public function getOrganisationReglesDeci(string $org_id) : \Metarisc\Model\ReglesDeci
    {
        $table = [
            'org_id' => $org_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/organisations/{org_id}/regles-deci');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\ReglesDeci::unserialize($object);
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

    /**
     * Ajout d'un un géo-service à une organisation.
     */
    public function postOrganisationGeoservices(string $org_id, \Metarisc\Model\ObjetOrganisationGeoservice $objet_organisation_geoservice = null) : void
    {
        $table = [
            'org_id' => $org_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/organisations/{org_id}/geoservices');

        $this->request('POST', $path, [
            'json' => [
                'nom'  => $objet_organisation_geoservice?->getNom(),
                'type' => $objet_organisation_geoservice?->getType(),
                'url'  => $objet_organisation_geoservice?->getUrl(),
            ],
        ]);
    }

    /**
     * Ajout d'un utilisateur comme membre dans une organisation.
     */
    public function addOrganisationMembres(string $org_id, \Metarisc\Model\ObjetOrganisationMembre $objet_organisation_membre = null) : void
    {
        $table = [
            'org_id' => $org_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/organisations/{org_id}/membres');

        $this->request('POST', $path, [
            'json' => [
                'utilisateur_id' => $objet_organisation_membre?->getUtilisateurId(),
                'role'           => $objet_organisation_membre?->getRole(),
            ],
        ]);
    }

    /**
     * Mise à jour des préférences de l'organisation en définissant les valeurs des paramètres transmis. Tous les paramètres non fournis resteront inchangés.
     */
    public function updateOrganisationPreferences(string $org_id, \Metarisc\Model\ObjetOrganisationPrFRences $objet_organisation_pr_f_rences = null) : void
    {
        $table = [
            'org_id' => $org_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/organisations/{org_id}/preferences');

        $this->request('POST', $path, [
            'json' => [
                'platau_id_acteur'             => $objet_organisation_pr_f_rences?->getPlatauIdActeur(),
                'platau_active'                => $objet_organisation_pr_f_rences?->getPlatauActive(),
                's3_global_endpoint'           => $objet_organisation_pr_f_rences?->getS3GlobalEndpoint(),
                'rapport_modele_rapport_etude' => $objet_organisation_pr_f_rences?->getRapportModeleRapportEtude(),
            ],
        ]);
    }

    /**
     * Mise à jour de l'ensemble des règles utilisées pour le calcul de la conformité et de la performance DECI en définissant les valeurs des paramètres transmis. Tous les paramètres non fournis resteront inchangés.
     */
    public function postOrganisationReglesDeci(string $org_id, \Metarisc\Model\ObjetRGlesDECI $objet_r_gles_deci = null) : void
    {
        $table = [
            'org_id' => $org_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/organisations/{org_id}/regles-deci');

        $this->request('POST', $path, [
            'json' => [
                'pibi_conformite_matrice_seuil_pesee_1bar_par_nature' => $objet_r_gles_deci?->getPibiConformiteMatriceSeuilPesee1barParNature(),
                'pibi_performance_natures_performance_restreinte'     => $objet_r_gles_deci?->getPibiPerformanceNaturesPerformanceRestreinte(),
                'pibi_performance_natures_a_reformer'                 => $objet_r_gles_deci?->getPibiPerformanceNaturesAReformer(),
                'pibi_performance_seuil_pesee_1bar'                   => $objet_r_gles_deci?->getPibiPerformanceSeuilPesee1bar(),
                'pibi_conformite_seuil_surpression'                   => $objet_r_gles_deci?->getPibiConformiteSeuilSurpression(),
                'pibi_conformite_matrice_seuil_pesee_1bar_par_defaut' => $objet_r_gles_deci?->getPibiConformiteMatriceSeuilPesee1barParDefaut(),
                'pena_conformite_seuil_volume_citerne'                => $objet_r_gles_deci?->getPenaConformiteSeuilVolumeCiterne(),
            ],
        ]);
    }
}
