<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class DatesPassageCommissionAPI extends MetariscAbstract
{
    /**
     * Le compte rendu global est un document représentant la synthèse des avis et des échanges de tous les dossiers à l'ordre du jour d'une commission, en se basant sur le modèle de rapport de l'organisation. La génération du PDF est une opération qui peut être longue, en fonction de la taille et du nombre d'éléments à exporter.
     */
    public function getCompteRenduGlobalPdfDate(string $date_id) : \SplFileObject
    {
        $table = [
            'date_id' => $date_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dates_passage_commission/{date_id}/compte_rendu_global_pdf');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \SplFileObject::unserialize($object);
    }

    /**
     * L'export de la convocation des membres est une opération qui permet de récupérer un fichier PDF contenant la convocation pour une date de passage en commission. Le PDF généré est un document de synthèse qui reprend les informations de la commission, en se basant sur le modèle de rapport de l'organisation. La génération du PDF est une opération qui peut être longue, en fonction de la taille et du nombre d'éléments à exporter.
     */
    public function getConvocationPdfDate(string $date_id) : \SplFileObject
    {
        $table = [
            'date_id' => $date_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dates_passage_commission/{date_id}/convocation_pdf');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \SplFileObject::unserialize($object);
    }

    /**
     * Récupération d'une date de passage en commission.
     */
    public function getCommissionDate(string $date_id) : \Metarisc\Model\PassageCommission
    {
        $table = [
            'date_id' => $date_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dates_passage_commission/{date_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\PassageCommission::unserialize($object);
    }

    /**
     * Récupération d'une liste de dossiers à l'ordre du jour liés à une date de passage en commission.
     */
    public function paginateCommissionDateDossiers(string $date_id) : Pagerfanta
    {
        $table = [
            'date_id' => $date_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dates_passage_commission/{date_id}/ordre_du_jour');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\PassageCommissionDossier::class,
        ]);
    }

    /**
     * Ajout d'un dossier à l'ordre du jour d'un passage en commission.
     */
    public function postCommissionDateDossier(string $date_id, \Metarisc\Model\ObjetPassageEnCommissionDossier $objet_passage_en_commission_dossier = null) : void
    {
        $table = [
            'date_id' => $date_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dates_passage_commission/{date_id}/ordre_du_jour');

        $this->request('POST', $path, [
            'json' => [
                'dossier_id'      => $objet_passage_en_commission_dossier?->getDossierId(),
                'date_de_passage' => $objet_passage_en_commission_dossier?->getDateDePassage(),
            ],
        ]);
    }

    /**
     * Reprogrammation d'une date de passage en commission. Cette opération permet de reprogrammer une date de passage en commission. La date de début et la date de fin du passage en commission programmée sont modifiées. Si des dossier sont déjà associés à cette date de passage en commission, alors ces dossiers devront être reprogrammés car l'ordre du jour sera réinitialisé.
     */
    public function postReprogrammerDate(string $date_id, \Metarisc\Model\PostReprogrammerDateDatesPassageCommissionRequest $post_reprogrammer_date_dates_passage_commission_request = null) : void
    {
        $table = [
            'date_id' => $date_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/dates_passage_commission/{date_id}/reprogrammer');

        $this->request('POST', $path, [
            'json' => [
                'nouvelle_date_debut' => $post_reprogrammer_date_dates_passage_commission_request?->getNouvelleDateDebut(),
                'nouvelle_date_fin'   => $post_reprogrammer_date_dates_passage_commission_request?->getNouvelleDateFin(),
                'raison'              => $post_reprogrammer_date_dates_passage_commission_request?->getRaison(),
            ],
        ]);
    }
}
