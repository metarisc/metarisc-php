<?php

namespace Metarisc\Service;

use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class NotificationsAPI extends MetariscAbstract
{
    protected function replacements(array $replacement_table) : \Closure
    {
        return function (array $matches) use ($replacement_table) : string {
            /** @var array-key $key */
            $key = $matches[1];
            /** @var string $replacement */
            $replacement = $replacement_table[$key] ?? $matches[0];

            return $replacement;
        };
    }

    /**
     * Suppression d'une notification correspondante à l'id donné.
     */
    public function deleteNotification(string $notification_id) : void
    {
        $table = [
            'notification_id' => $notification_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/notifications/{notification_id}');
        $this->request('DELETE', $path);
    }

    /**
     * Récupération des détails d'une notification correspondante à l'id donné.
     */
    public function getNotification(string $notification_id, \Metarisc\Model\Notification $notification = null) : \Metarisc\Model\Notification
    {
        $table = [
            'notification_id' => $notification_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/notifications/{notification_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\Notification::unserialize($object);
    }

    /**
     * Récupération des détails de toutes les notifications existantes.
     */
    public function paginateNotifications(int $page = null, int $per_page = null) : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/notifications/');

        return $this->pagination('GET', $path, [
            'params' => [
                'page'     => $page,
                'per_page' => $per_page, ],
        ]);
    }

    /**
     * Création d'une notification.
     */
    public function postNotification(\Metarisc\Model\PostNotificationRequest $post_notification_request) : void
    {
        $this->request('POST', '/notifications/', [
            'json' => [
                'title'          => $post_notification_request->getTitle(),
                'message'        => $post_notification_request->getMessage(),
                'contexte'       => $post_notification_request->getContexte(),
                'utilisateur_id' => $post_notification_request->getUtilisateurId(),
            ],
        ]);
    }
}
