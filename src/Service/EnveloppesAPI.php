<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class EnveloppesAPI extends MetariscAbstract
{
    /**
     * Suppression d'une enveloppe (cette opération n'impacte pas les dossiers liés).
     */
    public function deleteEnveloppe(string $enveloppe_id) : void
    {
        $table = [
            'enveloppe_id' => $enveloppe_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/enveloppes/{enveloppe_id}');
        $this->request('DELETE', $path);
    }

    /**
     * Récupération de l'ensemble des données d'une enveloppe.
     */
    public function getEnveloppe(string $enveloppe_id) : \Metarisc\Model\Enveloppe
    {
        $table = [
            'enveloppe_id' => $enveloppe_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/enveloppes/{enveloppe_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\Enveloppe::unserialize($object);
    }

    /**
     * Récupération de la liste des enveloppes selon des critères de recherche.
     */
    public function paginateEnveloppe() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/enveloppes');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Enveloppe::class,
        ]);
    }

    /**
     * Mise à jour d'une nouvelle enveloppe.
     */
    public function patchEnveloppe(string $enveloppe_id, \Metarisc\Model\ObjetEnveloppe1 $objet_enveloppe1 = null) : void
    {
        $table = [
            'enveloppe_id' => $enveloppe_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/enveloppes/{enveloppe_id}');

        $this->request('PATCH', $path, [
            'json' => [
                'titre' => $objet_enveloppe1?->getTitre(),
            ],
        ]);
    }

    /**
     * Création d'une nouvelle enveloppe.
     */
    public function post(\Metarisc\Model\ObjetEnveloppe $objet_enveloppe) : void
    {
        $this->request('POST', '/enveloppes', [
            'json' => [
                'titre' => $objet_enveloppe->getTitre(),
            ],
        ]);
    }
}
