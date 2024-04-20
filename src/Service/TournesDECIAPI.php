<?php
namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class TournesDECIAPI extends MetariscAbstract
{

    
    

    
    /**
    * 
    * Suppression du contrôle PEI de la tournée DECI.
    * 
    */
    public function deleteTourneeDeciPei(string $tournee_deci_id, string $pei_id ) : void
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}/pei/{pei_id}');
        $this->request('DELETE', $path);

    }

    


    



    
    /**
    * 
    * Récupération des détails de la tournée DECI.
    * 
    */
    public function getTourneeDeci(string $tournee_deci_id ) : \Metarisc\Model\TourneeDeci
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        assert(is_array($object));

        return \Metarisc\Model\TourneeDeci::unserialize($object);


    }

    

    


    



    
    /**
    * 
    * Génération d'un livret de tournée pour une tournée DECI.
    * 
    */
    public function getTourneeDeciLivretDeTournee(string $tournee_deci_id ) : array
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}/livret_de_tournee');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        assert(is_array($object));

        return array::unserialize($object);


    }

    

    


    



    
    /**
    * 
    * Récupération des détails liés au contrôle d'un PEI d'une tournée.
    * 
    */
    public function getTourneeDeciPei(string $tournee_deci_id, string $pei_id ) : \Metarisc\Model\TourneeDeciPei
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}/pei/{pei_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        assert(is_array($object));

        return \Metarisc\Model\TourneeDeciPei::unserialize($object);


    }

    

    


    



    /**
     * 
     * Récupération de la liste des contrôles PEI liés à la tournée DECI.
     * 
     */

    public function paginateTourneeDeciPei(string $tournee_deci_id, ) :Pagerfanta
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}/pei');
        return  $this->pagination('GET', $path,[
            'params' => [],
            'model_class' => \Metarisc\Model\TourneeDeciPei::class,
        ]);
    }
    
    

    

    


    



    /**
     * 
     * Liste des tournées DECI.
     * 
     */

    public function paginateTourneesDeci() :Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci');
        return  $this->pagination('GET', $path,[
            'params' => [],
            'model_class' => \Metarisc\Model\TourneeDeci::class,
        ]);
    }
    
    

    

    


    



    

    

    
    /**
    * 
    * Ajout d'une nouvelle tournée DECI.
    * 
    */
    public function postTourneeDeci(\Metarisc\Model\PostTourneeDeciRequest $post_tournee_deci_request) : void
    {
        $this->request('POST', "/tournees_deci",[
            'json' => [
                'libelle' => $post_tournee_deci_request->getLibelle(),
                'description' => $post_tournee_deci_request->getDescription(),
                'date_de_debut' => $post_tournee_deci_request->getDateDeDebut(),
                'date_de_fin' => $post_tournee_deci_request->getDateDeFin(),
            ]
        ]);

    }
    


    



    

    

    


    
    /**
    * 
    * Ajout d'un PEI sur la tournée DECI.
    * 
    */
    public function postTourneeDeciPei(string $tournee_deci_id, \Metarisc\Model\PostTourneeDeciPeiRequest $post_tournee_deci_pei_request = null ) : void
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}/pei');

        $this->request('POST', $path,[
            'json' => [
                'pei_id' => $post_tournee_deci_pei_request?->getPeiId(),
                'ordre' => $post_tournee_deci_pei_request?->getOrdre(),
            ]
        ]);

    }
    



    

    

    


    
    /**
    * 
    * Mise à jour de la tournée DECI.
    * 
    */
    public function updateTourneeDeci(string $tournee_deci_id, \Metarisc\Model\PostTourneeDeciRequest $post_tournee_deci_request = null ) : void
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}');

        $this->request('POST', $path,[
            'json' => [
                'libelle' => $post_tournee_deci_request?->getLibelle(),
                'description' => $post_tournee_deci_request?->getDescription(),
                'date_de_debut' => $post_tournee_deci_request?->getDateDeDebut(),
                'date_de_fin' => $post_tournee_deci_request?->getDateDeFin(),
            ]
        ]);

    }
    



    

    

    


    
    /**
    * 
    * Mise à jour du PEI contrôlé dans une tournée DECI.
    * 
    */
    public function updateTourneeDeciPei(string $tournee_deci_id, string $pei_id, \Metarisc\Model\UpdateTourneeDeciPeiRequest $update_tournee_deci_pei_request = null ) : void
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}/pei/{pei_id}');

        $this->request('POST', $path,[
            'json' => [
                'liste_anomalies' => $update_tournee_deci_pei_request?->getListeAnomalies(),
                'engin_utilis' => $update_tournee_deci_pei_request?->getEnginUtilis(),
                'ordre' => $update_tournee_deci_pei_request?->getOrdre(),
                'date_du_controle' => $update_tournee_deci_pei_request?->getDateDuControle(),
            ]
        ]);

    }
    


}