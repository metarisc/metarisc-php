<?php
namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class PEIAPI extends MetariscAbstract
{

    
    
    /**
    * 
    * Récupération de l'ensemble des données d'un PEI.
    * 
    */
    public function getPei(string $pei_id, ) : \Metarisc\Model\PEI
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        assert(is_array($object));

        return \Metarisc\Model\PEI::unserialize($object);


    }

    

    


    



    
    /**
    * 
    * Récupération de toutes les références extérieures de l'objet.
    * 
    */
    public function getReferencesExterieuresPei(string $pei_id, ) : \Metarisc\Model\GetReferencesExterieuresErpErp200Response
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/references_exterieures');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        assert(is_array($object));

        return \Metarisc\Model\GetReferencesExterieuresErpErp200Response::unserialize($object);


    }

    

    


    



    /**
     * 
     * Récupération de la liste des anomalies DECI détectées sur le PEI.
     * 
     */

    public function paginatePeiAnomalies(string $pei_id, ) :Pagerfanta
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/anomalies');
        return  $this->pagination('GET', $path,[
            'params' => [],
            'model_class' => \Metarisc\Model\AnomaliePEI::class,
        ]);
    }
    
    

    

    


    



    /**
     * 
     * Récupération de la liste des contacts.
     * 
     */

    public function paginatePeiContacts(string $pei_id, ) :Pagerfanta
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/contacts');
        return  $this->pagination('GET', $path,[
            'params' => [],
            'model_class' => \Metarisc\Model\Contact::class,
        ]);
    }
    
    

    

    


    



    /**
     * 
     * Récupération de la liste des documents.
     * 
     */

    public function paginatePeiDocuments(string $pei_id, ) :Pagerfanta
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/documents');
        return  $this->pagination('GET', $path,[
            'params' => [],
            'model_class' => \Metarisc\Model\PieceJointe::class,
        ]);
    }
    
    

    

    


    



    /**
     * 
     * Récupération de la liste des dossiers.
     * 
     */

    public function paginatePeiDossiers(string $pei_id, ) :Pagerfanta
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/dossiers');
        return  $this->pagination('GET', $path,[
            'params' => [],
            'model_class' => \Metarisc\Model\Dossier::class,
        ]);
    }
    
    

    

    


    



    /**
     * 
     * Récupération de l'historique d'un POI.
     * 
     */

    public function paginatePeiHistorique(string $pei_id, ) :Pagerfanta
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/historique');
        return  $this->pagination('GET', $path,[
            'params' => [],
            'model_class' => \Metarisc\Model\DescriptifTechniqueDECI::class,
        ]);
    }
    
    

    

    


    



    /**
     * 
     * Récupération de la liste des Points d'Eau Incendie (PEI) selon des critères de recherche.
     * 
     */

    public function paginatePei() :Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei');
        return  $this->pagination('GET', $path,[
            'params' => [],
            'model_class' => \Metarisc\Model\PEI::class,
        ]);
    }
    
    

    

    


    



    

    

    


    
    /**
    * 
    * Créez ou mettez à jour des références extérieures. L'utilisation d'une valeur null pour une référence extérieure supprimera ou « annulera » la valeur de la propriété de la référence extérieure.
    * 
    */
    public function patchReferencesExterieuresPei(string $pei_id, \Metarisc\Model\ObjetRFRenceExtRieure[] $objet_rf_rence_ext_rieure = null ) : void
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/references_exterieures');

        $this->request('PATCH', $path,[
            'json' => [$objet_rf_rence_ext_rieure
            ]
        ]);

    }
    



    

    

    


    
    /**
    * 
    * Ajout d'anomalies DECI détectées sur le PEI.
    * 
    */
    public function postAnomaliesPei(string $pei_id, \Metarisc\Model\ObjetAnomaliePEI $objet_anomalie_pei = null ) : void
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/anomalies');

        $this->request('POST', $path,[
            'json' => [
                'code_anomalie' => $objet_anomalie_pei?->getCodeAnomalie(),
                'date_debut' => $objet_anomalie_pei?->getDateDebut(),
                'date_fin' => $objet_anomalie_pei?->getDateFin(),
            ]
        ]);

    }
    



    

    

    


    
    /**
    * 
    * Ajout d'un contact.
    * 
    */
    public function postContactsPei(string $pei_id, \Metarisc\Model\ObjetContact1 $objet_contact1 = null ) : void
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/contacts');

        $this->request('POST', $path,[
            'json' => [
                'nom' => $objet_contact1?->getNom(),
                'prenom' => $objet_contact1?->getPrenom(),
                'fonction' => $objet_contact1?->getFonction(),
                'telephone_fixe' => $objet_contact1?->getTelephoneFixe(),
                'telephone_portable' => $objet_contact1?->getTelephonePortable(),
                'telephone_fax' => $objet_contact1?->getTelephoneFax(),
                'adresse' => $objet_contact1?->getAdresse(),
                'site_web_url' => $objet_contact1?->getSiteWebUrl(),
                'civilite' => $objet_contact1?->getCivilite(),
                'societe' => $objet_contact1?->getSociete(),
                'email' => $objet_contact1?->getEmail(),
                'observations' => $objet_contact1?->getObservations(),
            ]
        ]);

    }
    



    

    

    


    
    /**
    * 
    * Ajout d'un document.
    * 
    */
    public function postDocumentsPei(string $pei_id, \Metarisc\Model\ObjetPieceJointe1 $objet_piece_jointe1 = null ) : void
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/documents');

        $this->request('POST', $path,[
            'json' => [
                'url' => $objet_piece_jointe1?->getUrl(),
                'nom' => $objet_piece_jointe1?->getNom(),
                'description' => $objet_piece_jointe1?->getDescription(),
                'type' => $objet_piece_jointe1?->getType(),
                'est_sensible' => $objet_piece_jointe1?->getEstSensible(),
            ]
        ]);

    }
    



    

    

    


    
    /**
    * 
    * Ajout d'un dossier.
    * 
    */
    public function postDossiersPei(string $pei_id, \Metarisc\Model\ObjetDossier1 $objet_dossier1 = null ) : void
    {
        $table = [
            'pei_id' => $pei_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/pei/{pei_id}/dossiers');

        $this->request('POST', $path,[
            'json' => [$objet_dossier1
            ]
        ]);

    }
    



    

    

    
    /**
    * 
    * Ajout d'un PEI.
    * 
    */
    public function postPei(\Metarisc\Model\ObjetPointDEauIncendie $objet_point_d_eau_incendie) : void
    {
        $this->request('POST', "/pei",[
            'json' => [
                'descriptif_technique' => $objet_point_d_eau_incendie->getDescriptifTechnique(),
                'implantation' => $objet_point_d_eau_incendie->getImplantation(),
                'numero_compteur' => $objet_point_d_eau_incendie->getNumeroCompteur(),
                'numero_serie_appareil' => $objet_point_d_eau_incendie->getNumeroSerieAppareil(),
            ]
        ]);

    }
    


    


}