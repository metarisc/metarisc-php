<?php

namespace Metarisc\Services;

use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;
use Metarisc\Models\Notification;
use Psr\Http\Message\ResponseInterface;

class NotificationsAPI extends MetariscAbstract
{
    private array $replacement_table;

    protected function replacements() : \Closure
    {
        $table = $this->replacement_table;

        return function ($matches) use ($table) {
            $param = $matches[1];
            if (isset($table[$param])) {
                return $table[$param];
            } else {
                return $matches;
            }
        };
    }

    public function deleteNotification($notification_id) : ResponseInterface
    {
        $this->replacement_table = [
            'notification_id' => $notification_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/notifications/{notification_id}');

        return $this->request('DELETE', $path);
    }

    public function getNotification($notification_id, $notification = null) : ResponseInterface
    {
        $this->replacement_table = [
            'notification_id' => $notification_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/notifications/{notification_id}');

        return $this->request('GET', $path);
    }

    public function paginateNotifications($page = null, $per_page = null) : Pagerfanta
    {
        $this->replacement_table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements(), '/notifications/');

        return $this->pagination('GET', $path, [
            'params' => [
                'page'     => $page,
                'per_page' => $per_page, ],
        ]);
    }

    public function postNotification(Notification $notification) : ResponseInterface
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
