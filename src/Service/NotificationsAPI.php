<?php

namespace Metarisc\Service;

use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

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
    public function deleteNotification(string $notification_id) : ResponseInterface
    {
        $table = [
            'notification_id' => $notification_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/notifications/{notification_id}');

        return $this->request('DELETE', $path);
    }

    /**
     * Récupération des détails d'une notification correspondante à l'id donné.
     */
    public function getNotification(string $notification_id, \Metarisc\Model\Notification $notification = null) : ResponseInterface
    {
        $table = [
            'notification_id' => $notification_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/notifications/{notification_id}');

        return $this->request('GET', $path);
    }

    /**
     * Récupération des détails de toutes les notifications existantes.
     */
    public function paginateNotifications(int $page = null, float $per_page = null) : Pagerfanta
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
    public function postNotification(\Metarisc\Model\Notification $notification) : ResponseInterface
    {
        return $this->request('POST', '/notifications/', [
            'json' => [
                'id'              => $notification->getId(),
                'title'           => $notification->getTitle(),
                'message'         => $notification->getMessage(),
                'contexte'        => $notification->getContexte(),
                'date_creation'   => $notification->getDateCreation(),
                'date_de_lecture' => $notification->getDateDeLecture(),
                'utilisateur_id'  => $notification->getUtilisateurId(),
            ],
        ]);
    }
}
