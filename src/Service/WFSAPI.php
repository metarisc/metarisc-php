<?php
namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class WFSAPI extends MetariscAbstract
{

    
    
    /**
    * 
    * Le point de terminaison DescribeFeatureType décrit les informations de champ concernant une ou plusieurs entités du service WFS. Cela inclut les noms de champs, les types de champs, les valeurs minimales et maximales autorisées dans les champs et toute autre contrainte définie dans un champ des classes d’entités ou tables.
    * 
    */
    public function describFeatureType() : array
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/wfs/DescribeFeatureType');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        assert(is_array($object));

        return array::unserialize($object);


    }

    

    


    



    

    
    /**
    * 
    * Le point de terminaison GetCapabilities permet aux clients de récupérer l'ensemble des caractéristiques du service WFS. La réponse est au format XML.
    * 
    */
    public function getCapabilities() : void
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/wfs/GetCapabilities');
        $this->request('GET', $path);

    }

    


    



    
    /**
    * 
    * Le point de terminaison GetFeature renvoie des informations concernant des types d’entités spécifiques disponibles par l’intermédiaire du service WFS.
    * 
    */
    public function getFeature() : \Metarisc\Model\GetFeature200Response
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/wfs/GetFeature');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        assert(is_array($object));

        return \Metarisc\Model\GetFeature200Response::unserialize($object);


    }

    

    


    


}