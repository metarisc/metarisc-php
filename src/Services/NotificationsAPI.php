<?php

namespace Metarisc\Services;

use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class NotificationsAPI extends MetariscAbstract
{
    protected function replacements(array $replacement_table) : \Closure
    {
        return function (string $matches) use ($replacement_table) {
            $param = $matches[1];
            if (isset($replacement_table[$param])) {
                return $replacement_table[$param];
            } else {
                return $matches;
            }
        };
    }

    public function deleteNotification(string $notification_id) : ResponseInterface
    {
        $table = [
            'notification_id' => $notification_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/notifications/{notification_id}');

        return $this->request('DELETE', $path);
    }

    public function getNotification(string $notification_id, \Metarisc\Models\Notification $notification = null) : ResponseInterface
    {
        $table = [
            'notification_id' => $notification_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/notifications/{notification_id}');

        return $this->request('GET', $path);
    }

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

    public function postNotification(\Metarisc\Models\Notification $notification) : ResponseInterface
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
