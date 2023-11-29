<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class SupportAPI extends MetariscAbstract
{
    /**
     * Récupération des détails du ticket.
     */
    public function getTicket(string $ticket_id) : \Metarisc\Model\Ticket
    {
        $table = [
            'ticket_id' => $ticket_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/support/{ticket_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\Ticket::unserialize($object);
    }

    /**
     * Récupération de la liste des tickets de support.
     */
    public function paginateTickets() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/support/');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Ticket::class,
        ]);
    }

    /**
     * Création d'un nouveau ticket de support.
     */
    public function postTicket(\Metarisc\Model\PostTicketRequest $post_ticket_request) : void
    {
        $this->request('POST', '/support/', [
            'json' => [
                'subject'     => $post_ticket_request->getSubject(),
                'description' => $post_ticket_request->getDescription(),
            ],
        ]);
    }
}
