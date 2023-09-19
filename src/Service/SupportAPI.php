<?php

namespace Metarisc\Service;

use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class SupportAPI extends MetariscAbstract
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
     * Récupération des détails du ticket.
     */
    public function getTicket(string $ticket_id) : \Metarisc\Model\Ticket
    {
        $table = [
            'ticket_id' => $ticket_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/support/{ticket_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\Ticket::unserialize($object);
    }

    /**
     * Récupération de la liste des tickets de support.
     */
    public function paginateTickets(int $page = null, int $per_page = null) : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/support/');

        return $this->pagination('GET', $path, [
            'params' => [
                'page'     => $page,
                'per_page' => $per_page, ],
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
