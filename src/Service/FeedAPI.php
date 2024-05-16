<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class FeedAPI extends MetariscAbstract
{
    /**
     * Récupération d'une liste de message composant un flux d'activité pour l'utilisateur connecté.
     */
    public function paginateFeedMessages() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/feed');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\FeedMessage::class,
        ]);
    }

    /**
     * Ajoute un message dans le feed général.
     */
    public function postMessage(\Metarisc\Model\FeedMessage $feed_message) : void
    {
        $this->request('POST', '/feed', [
            'json' => [$feed_message,
            ],
        ]);
    }
}
