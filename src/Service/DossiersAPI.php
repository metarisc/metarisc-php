<?php
namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class DossiersAPI extends MetariscAbstract
{

    
    

    
    /**
    * 
    * Désarchiver le dossier.
    * 
    */
    public function deleteArchiverDossier(string $dossier_id, ) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/archiver');
        $this->request('DELETE', $path);

    }

    


    



    
    /**
    * 
    * Liste des affectations du dossier.
    * 
    */
    public function getAffectationsDossier(string $dossier_id, ) : \Metarisc\Model\GetAffectationsDossierDossiers200Response
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/affectations');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        assert(is_array($object));

        return \Metarisc\Model\GetAffectationsDossierDossiers200Response::unserialize($object);


    }

    

    


    



    
    /**
    * 
    * Récupération de l'ensemble des données d'un dossier.
    * 
    */
    public function getDossier(string $dossier_id, ) : \Metarisc\Model\Dossier
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        assert(is_array($object));

        return \Metarisc\Model\Dossier::unserialize($object);


    }

    

    


    



    
    /**
    * 
    * Récupération des essais réalisés d'un dossier de visite.
    * 
    */
    public function getEssaisDossier(string $dossier_id, ) : \Metarisc\Model\GetEssaisDossierDossiers200Response
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/essais');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        assert(is_array($object));

        return \Metarisc\Model\GetEssaisDossierDossiers200Response::unserialize($object);


    }

    

    


    



    
    /**
    * 
    * L'export du rapport d'étude est une opération qui permet de récupérer un fichier PDF contenant l'ensemble des éléments du dossier d'étude. Le SIS réalise pour chaque étude ou visite un rapport détaillé par ERP. Ce document est présenté en commission par le sapeur pompier préventionniste en sa qualité de rapporteur et de technicien du risque. Le PDF généré est un document de synthèse qui reprend les informations du dossier, en se basant sur le modèle de rapport de l'organisation. L'export du dossier est une opération qui peut être longue, en fonction de la taille du dossier et du nombre d'éléments à exporter.
    * 
    */
    public function getPdfRapportEtudeDossier(string $dossier_id, ) : \SplFileObject
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/rapport_etude/pdf');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        assert(is_array($object));

        return \SplFileObject::unserialize($object);


    }

    

    


    



    
    /**
    * 
    * Ensemble des permissions de l'utilisateur connecté sur le dossier.
    * 
    */
    public function getPermissionsDossier(string $dossier_id, ) : \Metarisc\Model\GetPermissionsDossierDossiers200Response
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/permissions');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        assert(is_array($object));

        return \Metarisc\Model\GetPermissionsDossierDossiers200Response::unserialize($object);


    }

    

    


    



    
    /**
    * 
    * Récupération de la liste des prescriptions sur le rapport d'étude.
    * 
    */
    public function getPrescriptionsRapportEtudeDossier(string $dossier_id, ) : \Metarisc\Model\GetPrescriptionsRapportEtudeDossierDossiers200Response
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/rapport_etude/prescriptions');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        assert(is_array($object));

        return \Metarisc\Model\GetPrescriptionsRapportEtudeDossierDossiers200Response::unserialize($object);


    }

    

    


    



    
    /**
    * 
    * Récupération des détails du rapport d'étude.
    * 
    */
    public function getRapportEtudeDossier(string $dossier_id, ) : \Metarisc\Model\RapportEtude
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/rapport_etude');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        assert(is_array($object));

        return \Metarisc\Model\RapportEtude::unserialize($object);


    }

    

    


    



    
    /**
    * 
    * Récupération des détails du rapport de visite.
    * 
    */
    public function getRapportVisiteDossier(string $dossier_id, ) : \Metarisc\Model\RapportVisite
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/rapport_visite');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        assert(is_array($object));

        return \Metarisc\Model\RapportVisite::unserialize($object);


    }

    

    


    



    
    /**
    * 
    * Récupération de la liste des tags d'un dossier.
    * 
    */
    public function paginateDossierTags(string $dossier_id, ) : \Metarisc\Model\GetTagsDossierDossiers200Response
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/tags');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        assert(is_array($object));

        return \Metarisc\Model\GetTagsDossierDossiers200Response::unserialize($object);


    }

    

    


    



    /**
     * 
     * Récupération de la liste des contacts.
     * 
     */

    public function paginateDossierContacts(string $dossier_id, ) :Pagerfanta
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/contacts');
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

    public function paginateDossierDocuments(string $dossier_id, ) :Pagerfanta
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/documents');
        return  $this->pagination('GET', $path,[
            'params' => [],
            'model_class' => \Metarisc\Model\PieceJointe::class,
        ]);
    }
    
    

    

    


    



    /**
     * 
     * Récupération de la liste des dossiers selon des critères de recherche.
     * 
     */

    public function paginateDossiers() :Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers');
        return  $this->pagination('GET', $path,[
            'params' => [],
            'model_class' => \Metarisc\Model\Dossier::class,
        ]);
    }
    
    

    

    


    



    /**
     * 
     * Consulter l'espace d'échange pour le suivi du dossier.
     * 
     */

    public function paginateDossierFilRouge(string $dossier_id, ) :Pagerfanta
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/fil_rouge');
        return  $this->pagination('GET', $path,[
            'params' => [],
            'model_class' => \Metarisc\Model\FilRougeMessage::class,
        ]);
    }
    
    

    

    


    



    /**
     * 
     * Récupération de la liste des workflows d'un dossier.
     * 
     */

    public function paginateDossierWorkflows(string $dossier_id, ) :Pagerfanta
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/workflows');
        return  $this->pagination('GET', $path,[
            'params' => [],
            'model_class' => \Metarisc\Model\Workflow::class,
        ]);
    }
    
    

    

    


    



    

    

    


    
    /**
    * 
    * Ajoute une affectation à un dossier. Vous pouvez affecter plusieurs personnes au dossier, y compris vous-même. Cela permet de débloquer des droits spécifiques sur le traitement du dossier.
    * 
    */
    public function postAffectationsDossier(string $dossier_id, \Metarisc\Model\ObjetDossierAffectation $objet_dossier_affectation = null ) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/affectations');

        $this->request('POST', $path,[
            'json' => [
                'role' => $objet_dossier_affectation?->getRole(),
                'utilisateur_id' => $objet_dossier_affectation?->getUtilisateurId(),
            ]
        ]);

    }
    



    

    

    


    
    /**
    * 
    * Ajout d'un contact.
    * 
    */
    public function postContactsDossier(string $dossier_id, \Metarisc\Model\ObjetContact1 $objet_contact1 = null ) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/contacts');

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
    public function postDocumentsDossier(string $dossier_id, \Metarisc\Model\ObjetPieceJointe1 $objet_piece_jointe1 = null ) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/documents');

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
    * Modification d'un dossier existant en définissant les valeurs des paramètres transmis. Tous les paramètres non fournis resteront inchangés.
    * 
    */
    public function patchDossier(string $dossier_id, \Metarisc\Model\ObjetDossier $objet_dossier = null ) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}');

        $this->request('POST', $path,[
            'json' => [$objet_dossier
            ]
        ]);

    }
    



    

    

    


    
    /**
    * 
    * Ajoute un message dans le fil rouge d'un dossier pour l'utilisateur connecté.
    * 
    */
    public function postFilRougeDossier(string $dossier_id, \Metarisc\Model\ObjetFilRougeMessage $objet_fil_rouge_message = null ) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/fil_rouge');

        $this->request('POST', $path,[
            'json' => [
                'message' => $objet_fil_rouge_message?->getMessage(),
            ]
        ]);

    }
    



    

    

    


    
    /**
    * 
    * Ajout d'une prescription sur le rapport d'étude.
    * 
    */
    public function postPrescriptionsRapportEtudeDossier(string $dossier_id, \Metarisc\Model\ObjetPrescriptionAnalyseDeRisque $objet_prescription_analyse_de_risque = null ) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/rapport_etude/prescriptions');

        $this->request('POST', $path,[
            'json' => [$objet_prescription_analyse_de_risque
            ]
        ]);

    }
    



    

    

    


    
    /**
    * 
    * Mise à jour du rapport d'étude en définissant les valeurs des paramètres transmis. Tous les paramètres non fournis resteront inchangés.
    * 
    */
    public function postRapportEtudeDossier(string $dossier_id, \Metarisc\Model\ObjetAnalyseDeRisque $objet_analyse_de_risque = null ) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/rapport_etude');

        $this->request('POST', $path,[
            'json' => [
                'analyse_risque' => $objet_analyse_de_risque?->getAnalyseRisque(),
                'observations' => $objet_analyse_de_risque?->getObservations(),
                'prise_de_note_interne' => $objet_analyse_de_risque?->getPriseDeNoteInterne(),
                'proposition_avis' => $objet_analyse_de_risque?->getPropositionAvis(),
                'proposition_avis_observations' => $objet_analyse_de_risque?->getPropositionAvisObservations(),
                'facteur_dangerosite' => $objet_analyse_de_risque?->getFacteurDangerosite(),
                'documents_techniques' => $objet_analyse_de_risque?->getDocumentsTechniques(),
                'textes_applicables' => $objet_analyse_de_risque?->getTextesApplicables(),
                'descriptif_dossier' => $objet_analyse_de_risque?->getDescriptifDossier(),
            ]
        ]);

    }
    



    

    

    


    
    /**
    * 
    * Mise à jour du rapport de visite en définissant les valeurs des paramètres transmis. Tous les paramètres non fournis resteront inchangés.
    * 
    */
    public function postRapportVisiteDossier(string $dossier_id, \Metarisc\Model\ObjetAnalyseDeRisque1 $objet_analyse_de_risque1 = null ) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/rapport_visite');

        $this->request('POST', $path,[
            'json' => [
                'observations' => $objet_analyse_de_risque1?->getObservations(),
                'prise_de_note_interne' => $objet_analyse_de_risque1?->getPriseDeNoteInterne(),
                'proposition_avis' => $objet_analyse_de_risque1?->getPropositionAvis(),
                'proposition_avis_observations' => $objet_analyse_de_risque1?->getPropositionAvisObservations(),
                'facteur_dangerosite' => $objet_analyse_de_risque1?->getFacteurDangerosite(),
                'documents_techniques' => $objet_analyse_de_risque1?->getDocumentsTechniques(),
                'essais' => $objet_analyse_de_risque1?->getEssais(),
            ]
        ]);

    }
    



    

    

    


    
    /**
    * 
    * Réorganiser les numéros d'ordre des prescriptions du rapport d'étude. Cela permet de mettre à jour simplement les numéros d'ordre des prescriptions du rapport d'étude.
    * 
    */
    public function postReorganiserPrescriptionsRapportEtudeDossier(string $dossier_id, \Metarisc\Model\PostReorganiserPrescriptionsRapportEtudeDossierDossiersRequest $post_reorganiser_prescriptions_rapport_etude_dossier_dossiers_request = null ) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/rapport_etude/prescriptions/reorganiser');

        $this->request('POST', $path,[
            'json' => [
                'prescriptions' => $post_reorganiser_prescriptions_rapport_etude_dossier_dossiers_request?->getPrescriptions(),
            ]
        ]);

    }
    



    

    

    


    
    /**
    * 
    * Permet de remplacer les tags d'un dossier existant par les valeurs transmis. Si un tableau vide est envoyé, les tags seront réinitialisés.
    * 
    */
    public function postTagsDossier(string $dossier_id, \Metarisc\Model\ObjetTag[] $objet_tag = null ) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/tags');

        $this->request('POST', $path,[
            'json' => [$objet_tag
            ]
        ]);

    }
    



    

    

    


    
    /**
    * 
    * Archiver le dossier.
    * 
    */
    public function putArchiverDossier(string $dossier_id, ) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/archiver');

        $this->request('PUT', $path,[
            'json' => [
            ]
        ]);

    }
    



    

    

    


    
    /**
    * 
    * Mise à jour des essais réalisés en définissant les valeurs des paramètres transmis.
    * 
    */
    public function putEssaisDossier(string $dossier_id, \Metarisc\Model\PutEssaisDossierDossiersRequest $put_essais_dossier_dossiers_request = null ) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dossiers/{dossier_id}/essais');

        $this->request('PUT', $path,[
            'json' => [
                'essais' => $put_essais_dossier_dossiers_request?->getEssais(),
            ]
        ]);

    }
    


}