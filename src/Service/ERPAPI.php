<?php
namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class ERPAPI extends MetariscAbstract
{

    
    
    /**
    * 
    * Récupération des détails de l'ERP.
    * 
    */
    public function getErp(string $erp_id, ) : \Metarisc\Model\ERP
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        assert(is_array($object));

        return \Metarisc\Model\ERP::unserialize($object);


    }

    

    


    



    
    /**
    * 
    * Ensemble des permissions de l'utilisateur connecté sur l'ERP.
    * 
    */
    public function getPermissionsErp(string $erp_id, ) : \Metarisc\Model\GetPermissionsErpErp200Response
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/permissions');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        assert(is_array($object));

        return \Metarisc\Model\GetPermissionsErpErp200Response::unserialize($object);


    }

    

    


    



    
    /**
    * 
    * Récupération de toutes les références extérieures de l'objet.
    * 
    */
    public function getReferencesExterieuresErp(string $erp_id, ) : \Metarisc\Model\GetReferencesExterieuresErpErp200Response
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/references_exterieures');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        assert(is_array($object));

        return \Metarisc\Model\GetReferencesExterieuresErpErp200Response::unserialize($object);


    }

    

    


    



    /**
     * 
     * Récupération de la liste des contacts.
     * 
     */

    public function paginateErpContacts(string $erp_id, ) :Pagerfanta
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/contacts');
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

    public function paginateErpDocuments(string $erp_id, ) :Pagerfanta
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/documents');
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

    public function paginateErpDossiers(string $erp_id, ) :Pagerfanta
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/dossiers');
        return  $this->pagination('GET', $path,[
            'params' => [],
            'model_class' => \Metarisc\Model\Dossier::class,
        ]);
    }
    
    

    

    


    



    /**
     * 
     * Récupération de la liste des Établissements Recevant du Public (ERP) selon des critères de recherche.
     * 
     */

    public function paginateErp() :Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp');
        return  $this->pagination('GET', $path,[
            'params' => [],
            'model_class' => \Metarisc\Model\ERP::class,
        ]);
    }
    
    

    

    


    



    /**
     * 
     * Récupération de l'historique d'un ERP.
     * 
     */

    public function paginateErpHistorique(string $erp_id, ) :Pagerfanta
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/historique');
        return  $this->pagination('GET', $path,[
            'params' => [],
            'model_class' => \Metarisc\Model\DescriptifTechniqueERP::class,
        ]);
    }
    
    

    

    


    



    /**
     * 
     * Récupération de la liste des mains courantes.
     * 
     */

    public function paginateErpMainsCourantes(string $erp_id, ) :Pagerfanta
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/mains_courantes');
        return  $this->pagination('GET', $path,[
            'params' => [],
            'model_class' => \Metarisc\Model\MainCourante::class,
        ]);
    }
    
    

    

    


    



    /**
     * 
     * Retourne la liste des prescriptions soulevées dans les visites et les études de l'ERP.
     * 
     */

    public function paginateErpPrescriptions(string $erp_id, ) :Pagerfanta
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/prescriptions');
        return  $this->pagination('GET', $path,[
            'params' => [],
            'model_class' => \Metarisc\Model\Prescription::class,
        ]);
    }
    
    

    

    


    



    /**
     * 
     * Retourne la liste des textes applicables d'un ERP en fonction de son type d'activité.
     * 
     */

    public function paginateTextesApplicables(string $erp_id, ) :Pagerfanta
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/textes_applicables');
        return  $this->pagination('GET', $path,[
            'params' => [],
            'model_class' => \Metarisc\Model\PrescriptionSupportReglementaire::class,
        ]);
    }
    
    

    

    


    



    

    

    


    
    /**
    * 
    * Créez ou mettez à jour des références extérieures. L'utilisation d'une valeur null pour une référence extérieure supprimera ou « annulera » la valeur de la propriété de la référence extérieure.
    * 
    */
    public function patchReferencesExterieuresErp(string $erp_id, \Metarisc\Model\ObjetRFRenceExtRieure[] $objet_rf_rence_ext_rieure = null ) : void
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/references_exterieures');

        $this->request('PATCH', $path,[
            'json' => [$objet_rf_rence_ext_rieure
            ]
        ]);

    }
    



    

    

    


    
    /**
    * 
    * Ajout d'un contact.
    * 
    */
    public function postContactsErp(string $erp_id, \Metarisc\Model\ObjetContact1 $objet_contact1 = null ) : void
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/contacts');

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
    public function postDocumentsErp(string $erp_id, \Metarisc\Model\ObjetPieceJointe1 $objet_piece_jointe1 = null ) : void
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/documents');

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
    public function postDossiersErp(string $erp_id, \Metarisc\Model\ObjetDossier1 $objet_dossier1 = null ) : void
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/dossiers');

        $this->request('POST', $path,[
            'json' => [$objet_dossier1
            ]
        ]);

    }
    



    

    

    
    /**
    * 
    * Création d'un nouveau ERP.
    * 
    */
    public function post(\Metarisc\Model\ObjetERP $objet_erp) : void
    {
        $this->request('POST', "/erp",[
            'json' => [
                'implantation' => $objet_erp->getImplantation(),
                'descriptif_technique' => $objet_erp->getDescriptifTechnique(),
                'avis_exploitation' => $objet_erp->getAvisExploitation(),
                'date_pc_initial' => $objet_erp->getDatePcInitial(),
                'date_ouverture' => $objet_erp->getDateOuverture(),
                'date_derniere_visite' => $objet_erp->getDateDerniereVisite(),
                'notes_internes' => $objet_erp->getNotesInternes(),
                'sites_geographiques_id' => $objet_erp->getSitesGeographiquesId(),
                'commission_de_securite_id' => $objet_erp->getCommissionDeSecuriteId(),
                'titulaires_id' => $objet_erp->getTitulairesId(),
                'etablissement_rattache' => $objet_erp->getEtablissementRattache(),
                'textes_applicables' => $objet_erp->getTextesApplicables(),
            ]
        ]);

    }
    


    



    

    

    


    
    /**
    * 
    * Mise à jour des détails d'un ERP en définissant les valeurs des paramètres transmis. Tous les paramètres non fournis resteront inchangés.
    * 
    */
    public function postErp(string $erp_id, \Metarisc\Model\ObjetERP1 $objet_erp1 = null ) : void
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}');

        $this->request('POST', $path,[
            'json' => [
                'implantation' => $objet_erp1?->getImplantation(),
                'descriptif_technique' => $objet_erp1?->getDescriptifTechnique(),
                'date_pc_initial' => $objet_erp1?->getDatePcInitial(),
                'date_ouverture' => $objet_erp1?->getDateOuverture(),
                'notes_internes' => $objet_erp1?->getNotesInternes(),
                'sites_geographiques_id' => $objet_erp1?->getSitesGeographiquesId(),
                'commission_de_securite_id' => $objet_erp1?->getCommissionDeSecuriteId(),
                'titulaires_id' => $objet_erp1?->getTitulairesId(),
                'etablissement_rattache' => $objet_erp1?->getEtablissementRattache(),
                'textes_applicables' => $objet_erp1?->getTextesApplicables(),
            ]
        ]);

    }
    



    

    

    


    
    /**
    * 
    * Ajout d'une main courante.
    * 
    */
    public function postMainsCourantesErp(string $erp_id, \Metarisc\Model\ObjetMainCourante $objet_main_courante = null ) : void
    {
        $table = [
            'erp_id' => $erp_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/erp/{erp_id}/mains_courantes');

        $this->request('POST', $path,[
            'json' => [
                'objet' => $objet_main_courante?->getObjet(),
                'date' => $objet_main_courante?->getDate(),
                'compte_rendu' => $objet_main_courante?->getCompteRendu(),
                'type' => $objet_main_courante?->getType(),
            ]
        ]);

    }
    


}