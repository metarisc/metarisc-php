<?php

namespace Metarisc\Service;

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

    /**
     * Le point de terminaison DescribeFeatureType décrit les informations de champ concernant une ou plusieurs entités du service WFS. Cela inclut les noms de champs, les types de champs, les valeurs minimales et maximales autorisées dans les champs et toute autre contrainte définie dans un champ des classes d’entités ou tables.
     */
    public function describFeatureType() : ResponseInterface
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/wfs/DescribeFeatureType');

        return $this->request('GET', $path);
    }

    /**
     * Le point de terminaison GetCapabilities permet aux clients de récupérer l'ensemble des caractéristiques du service WFS. La réponse est au format XML.
     */
    public function getCapabilities() : ResponseInterface
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/wfs/GetCapabilities');

        return $this->request('GET', $path);
    }

    /**
     * Le point de terminaison GetFeature renvoie des informations concernant des types d’entités spécifiques disponibles par l’intermédiaire du service WFS.
     */
    public function getFeature() : ResponseInterface
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/wfs/GetFeature');

        return $this->request('GET', $path);
    }
}
