<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class PrescriptionsAPI extends MetariscAbstract
{
    /**
     * Suppression d'une prescription type de la bibliothèque.
     */
    public function deletePrescription(string $prescription_id) : void
    {
        $table = [
            'prescription_id' => $prescription_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/prescriptions/{prescription_id}');
        $this->request('DELETE', $path);
    }

    /**
     * Suppression d'un support réglementaire.
     */
    public function deleteSupportReglementaire(string $support_reglementaire_id) : void
    {
        $table = [
            'support_reglementaire_id' => $support_reglementaire_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/supports_reglementaires/{support_reglementaire_id}');
        $this->request('DELETE', $path);
    }

    /**
     * Récupération des détails d'une prescription dans la bibliothèque.
     */
    public function getPrescription(string $prescription_id) : \Metarisc\Model\Prescription
    {
        $table = [
            'prescription_id' => $prescription_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/prescriptions/{prescription_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\Prescription::unserialize($object);
    }

    /**
     * Récupération des détails d'un support réglementaire.
     */
    public function getSupportReglementaire(string $support_reglementaire_id) : \Metarisc\Model\PrescriptionSupportReglementaire
    {
        $table = [
            'support_reglementaire_id' => $support_reglementaire_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/supports_reglementaires/{support_reglementaire_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\PrescriptionSupportReglementaire::unserialize($object);
    }

    /**
     * Liste des prescriptions.
     */
    public function paginatePrescriptions() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/prescriptions');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Prescription::class,
        ]);
    }

    /**
     * Liste des supports réglementaires.
     */
    public function paginateSupportsReglementaires() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/supports_reglementaires');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\PrescriptionSupportReglementaire::class,
        ]);
    }

    /**
     * Ajout d'une nouvelle prescription type dans la bibliothèque.
     */
    public function postPrescription(\Metarisc\Model\Prescription $prescription) : void
    {
        $this->request('POST', '/prescriptions', [
            'json' => [
                'id'                         => $prescription->getId(),
                'contenu'                    => $prescription->getContenu(),
                'type'                       => $prescription->getType(),
                'supports_reglementaires'    => $prescription->getSupportsReglementaires(),
                'supports_reglementaires_id' => $prescription->getSupportsReglementairesId(),
            ],
        ]);
    }

    /**
     * Ajouter un support réglementaire.
     */
    public function postSupportReglementaire(\Metarisc\Model\PrescriptionSupportReglementaire $prescription_support_reglementaire) : void
    {
        $this->request('POST', '/supports_reglementaires', [
            'json' => [
                'id'             => $prescription_support_reglementaire->getId(),
                'nature'         => $prescription_support_reglementaire->getNature(),
                'legifrance_cid' => $prescription_support_reglementaire->getLegifranceCid(),
                'contenu'        => $prescription_support_reglementaire->getContenu(),
                'titre'          => $prescription_support_reglementaire->getTitre(),
                'etat'           => $prescription_support_reglementaire->getEtat(),
                'reference'      => $prescription_support_reglementaire->getReference(),
            ],
        ]);
    }
}
