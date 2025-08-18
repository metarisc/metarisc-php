<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class TournesDECIAPI extends MetariscAbstract
{
    /**
     * Récupération des détails de la tournée DECI.
     */
    public function getTourneeDeci(string $tournee_deci_id) : \Metarisc\Model\TourneeDeci
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\TourneeDeci::unserialize($object);
    }

    /**
     * Récupération de la liste des documents.
     */
    public function paginateTourneeDeciDocuments(string $tournee_deci_id) : Pagerfanta
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}/documents');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\PieceJointe::class,
        ]);
    }

    /**
     * Récupération de la liste des contrôles PEI liés à la tournée DECI.
     */
    public function paginateTourneeDeciPei(string $tournee_deci_id) : Pagerfanta
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}/pei');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\TourneeDeciPei::class,
        ]);
    }

    /**
     * Liste des tournées DECI.
     */
    public function paginateTourneesDeci() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\TourneeDeci::class,
        ]);
    }

    /**
     * L'appel à ce endpoint permet de déclencher une nouvelle tournée DECI depuis un modèle donné. L'ID de la tournée DECI doit correspondre à une Tournée Modèle, sinon l'endpoint retournera une erreur.
     */
    public function declencherTourneeDeci(string $tournee_deci_id) : void
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}/declencher');

        $this->request('POST', $path, [
            'json' => [
            ],
        ]);
    }

    /**
     * Ajout d'un document.
     */
    public function postDocumentsTourneeDeci(string $tournee_deci_id, \Metarisc\Model\ObjetPieceJointe1 $objet_piece_jointe1 = null) : void
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}/documents');

        $this->request('POST', $path, [
            'json' => [
                'url'          => $objet_piece_jointe1?->getUrl(),
                'nom'          => $objet_piece_jointe1?->getNom(),
                'description'  => $objet_piece_jointe1?->getDescription(),
                'type'         => $objet_piece_jointe1?->getType(),
                'est_sensible' => $objet_piece_jointe1?->getEstSensible(),
            ],
        ]);
    }

    /**
     * Ajout d'un PEI sur la tournée DECI.
     */
    public function postTourneeDeciPei(string $tournee_deci_id, \Metarisc\Model\ObjetTournEDeciPEI1 $objet_tourn_e_deci_pei1 = null) : void
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}/pei');

        $this->request('POST', $path, [
            'json' => [
                'pei_id' => $objet_tourn_e_deci_pei1?->getPeiId(),
            ],
        ]);
    }

    /**
     * Mise à jour de la tournée DECI en définissant les valeurs des paramètres transmis. Tous les paramètres non fournis resteront inchangés.
     */
    public function updateTourneeDeci(string $tournee_deci_id, \Metarisc\Model\ObjetTournEDeci1 $objet_tourn_e_deci1 = null) : void
    {
        $table = [
            'tournee_deci_id' => $tournee_deci_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/tournees_deci/{tournee_deci_id}');

        $this->request('POST', $path, [
            'json' => [$objet_tourn_e_deci1,
            ],
        ]);
    }

    /**
     * Ajout d'une nouvelle tournée DECI.
     */
    public function postTourneeDeci(\Metarisc\Model\ObjetTournEDeci $objet_tourn_e_deci) : void
    {
        $this->request('POST', '/tournees_deci', [
            'json' => [$objet_tourn_e_deci,
            ],
        ]);
    }
}
