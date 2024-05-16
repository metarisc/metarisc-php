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
    public function postNotification(\Metarisc\Model\Notification $notification) : void
    {
        $this->request('POST', '/notifications', [
            'json' => [
                'id'              => $notification->getId(),
                'title'           => $notification->getTitle(),
                'message'         => $notification->getMessage(),
                'contexte'        => $notification->getContexte(),
                'date_creation'   => $notification->getDateCreation(),
                'date_de_lecture' => $notification->getDateDeLecture(),
                'utilisateur_id'  => $notification->getUtilisateurId(),
                'utilisateur'     => $notification->getUtilisateur(),
            ],
        ]);
    }
}
