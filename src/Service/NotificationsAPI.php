<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class NotificationsAPI extends MetariscAbstract
{
    /**
     * Suppression d'une notification correspondante à l'id donné.
     */
    public function deleteNotification(string $notification_id) : void
    {
        $table = [
            'notification_id' => $notification_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/notifications/{notification_id}');
        $this->request('DELETE', $path);
    }

    /**
     * Récupération des détails d'une notification correspondante à l'id donné.
     */
    public function getNotification(string $notification_id) : \Metarisc\Model\Notification
    {
        $table = [
            'notification_id' => $notification_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/notifications/{notification_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\Notification::unserialize($object);
    }

    /**
     * Récupération des détails de toutes les notifications existantes pour l'utilisateur connecté.
     */
    public function paginateNotifications() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/notifications');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Notification::class,
        ]);
    }

    /**
     * Création d'une notification.
     */
    public function postNotification(\Metarisc\Model\Notification1 $notification1) : void
    {
        $this->request('POST', '/notifications', [
            'json' => [
                'title'          => $notification1->getTitle(),
                'message'        => $notification1->getMessage(),
                'type'           => $notification1->getType(),
                'contexte'       => $notification1->getContexte(),
                'utilisateur_id' => $notification1->getUtilisateurId(),
            ],
        ]);
    }
}
