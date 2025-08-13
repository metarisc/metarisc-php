<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class SitesGeographiquesAPI extends MetariscAbstract
{
    /**
     * Suppression d'un site géographique (cette opération n'impacte pas les ERP liés).
     */
    public function deleteSiteGeographique(string $site_geographique_id) : void
    {
        $table = [
            'site_geographique_id' => $site_geographique_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/sites_geographiques/{site_geographique_id}');
        $this->request('DELETE', $path);
    }

    /**
     * Récupération de l'ensemble des données d'un site géographique.
     */
    public function getSiteGeographique(string $site_geographique_id) : \Metarisc\Model\SiteGeographique
    {
        $table = [
            'site_geographique_id' => $site_geographique_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/sites_geographiques/{site_geographique_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\SiteGeographique::unserialize($object);
    }

    /**
     * Récupération de la liste des sites géographiques selon des critères de recherche.
     */
    public function paginate() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/sites_geographiques');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\SiteGeographique::class,
        ]);
    }

    /**
     * Mise à jour d'un site géographique.
     */
    public function patchSiteGeographique(string $site_geographique_id, \Metarisc\Model\ObjetSiteGOgraphique1 $objet_site_g_ographique1 = null) : void
    {
        $table = [
            'site_geographique_id' => $site_geographique_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/sites_geographiques/{site_geographique_id}');

        $this->request('PATCH', $path, [
            'json' => [
                'libelle' => $objet_site_g_ographique1?->getLibelle(),
                'notes'   => $objet_site_g_ographique1?->getNotes(),
                'type'    => $objet_site_g_ographique1?->getType(),
            ],
        ]);
    }

    /**
     * Création d'un site géographique.
     */
    public function post(\Metarisc\Model\ObjetSiteGOgraphique $objet_site_g_ographique) : void
    {
        $this->request('POST', '/sites_geographiques', [
            'json' => [
                'libelle' => $objet_site_g_ographique->getLibelle(),
                'notes'   => $objet_site_g_ographique->getNotes(),
                'type'    => $objet_site_g_ographique->getType(),
            ],
        ]);
    }
}
