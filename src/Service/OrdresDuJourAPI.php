<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Metarisc\MetariscAbstract;

class OrdresDuJourAPI extends MetariscAbstract
{
    /**
     * Suppression du dossier de l'ordre du jour d'une date de passage en commission.
     */
    public function deleteCommissionDateDossier(string $dossier_id) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/ordres_du_jour/{dossier_id}');
        $this->request('DELETE', $path);
    }

    /**
     * L'export du compte rendu résume le contenu du passage en commission de sécurité. Il précise notamment la position individuelle de chaque membre.  Etabli à l’issue de la réunion, il est signé du président de séance, approuvé par les membres et conservé au dossier par le SDIS. Le PDF généré est un document de synthèse qui reprend les informations de la commission, en se basant sur le modèle de rapport de l'organisation. La génération du PDF est une opération qui peut être longue, en fonction de la taille et du nombre d'éléments à exporter.
     */
    public function getCompteRenduPdfDossier(string $dossier_id) : \SplFileObject
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/ordres_du_jour/{dossier_id}/compte_rendu_pdf');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \SplFileObject::unserialize($object);
    }

    /**
     * Liste des prescriptions sur un dossier à l'ordre du jour d'une date de passage en commission. Les prescriptions sont ordonnées par leur numéro d'ordre.
     */
    public function getPrescriptionsDossier(string $dossier_id) : \Metarisc\Model\GetPrescriptionsRapportEtudeDossierDossiers200Response
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/ordres_du_jour/{dossier_id}/prescriptions');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\GetPrescriptionsRapportEtudeDossierDossiers200Response::unserialize($object);
    }

    /**
     * Le procès verbal est le document officiel de la commission de sécurité remis à l’autorité de police compétente. Il contient l’avis unique prononcé, exprimant la position collégiale de la commission. Le PDF généré est un document de synthèse qui reprend les informations de la commission, en se basant sur le modèle de rapport de l'organisation. La génération du PDF est une opération qui peut être longue, en fonction de la taille et du nombre d'éléments à exporter.
     */
    public function getProcesVerbalPdfDossier(string $dossier_id) : \SplFileObject
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/ordres_du_jour/{dossier_id}/proces_verbal_pdf');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \SplFileObject::unserialize($object);
    }

    /**
     * Mise à jour des détails d'un dossier lié à une date de passage en commission en définissant les valeurs des paramètres transmis. Tous les paramètres non fournis resteront inchangés.
     */
    public function updateCommissionDateDossier(string $dossier_id, \Metarisc\Model\ObjetPassageEnCommissionDossier1 $objet_passage_en_commission_dossier1 = null) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/ordres_du_jour/{dossier_id}');

        $this->request('POST', $path, [
            'json' => [
                'avis'            => $objet_passage_en_commission_dossier1?->getAvis(),
                'ge4_3'           => $objet_passage_en_commission_dossier1?->getGe43(),
                'date_de_passage' => $objet_passage_en_commission_dossier1?->getDateDePassage(),
                'avis_differe'    => $objet_passage_en_commission_dossier1?->getAvisDiffere(),
                'observations'    => $objet_passage_en_commission_dossier1?->getObservations(),
                'duree_minutes'   => $objet_passage_en_commission_dossier1?->getDureeMinutes(),
            ],
        ]);
    }

    /**
     * Ajout d'une prescription sur un dossier à l'ordre du jour à une date de passage en commission. La prescription est ajoutée à dans l'avis posé par la commission sur le dossier.
     */
    public function postPrescriptionsDossier(string $dossier_id, \Metarisc\Model\ObjetPrescriptionAnalyseDeRisque $objet_prescription_analyse_de_risque = null) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/ordres_du_jour/{dossier_id}/prescriptions');

        $this->request('POST', $path, [
            'json' => [$objet_prescription_analyse_de_risque,
            ],
        ]);
    }

    /**
     * Réorganiser les numéros d'ordre des prescriptions d'un ordre du jour d'un dossier. Cela permet de mettre à jour simplement les numéros d'ordre des prescriptions.
     */
    public function postReorganiserPrescriptionsDossier(string $dossier_id, \Metarisc\Model\PostReorganiserPrescriptionsRapportEtudeDossierDossiersRequest $post_reorganiser_prescriptions_rapport_etude_dossier_dossiers_request = null) : void
    {
        $table = [
            'dossier_id' => $dossier_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/ordres_du_jour/{dossier_id}/prescriptions/reorganiser');

        $this->request('POST', $path, [
            'json' => [
                'prescriptions' => $post_reorganiser_prescriptions_rapport_etude_dossier_dossiers_request?->getPrescriptions(),
            ],
        ]);
    }
}
