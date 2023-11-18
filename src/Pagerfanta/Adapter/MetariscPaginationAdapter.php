<?php

namespace Metarisc\Pagerfanta\Adapter;

use Metarisc\MetariscAbstract;
use Pagerfanta\Adapter\AdapterInterface;

final class MetariscPaginationAdapter implements AdapterInterface
{
    private ?array $current_page = null;

    /**
     * Initialisation de l'adapter Pagerfanta.
     */
    public function __construct(
        private MetariscAbstract $metarisc,
        private string $method,
        private string $uri = '',
        private array $options = []
    ) {
    }

    /**
     * Returns the number of results for the list.
     */
    public function getNbResults() : int
    {
        // Récupération d'une page (si elle n'existe pas dans notre "cache" interne)
        if (!$this->current_page) {
            $this->current_page = $this->fetchPage(1, 1);
        }

        // Récupération des "meta" dans la page
        \assert(\array_key_exists('meta', $this->current_page), 'La pagination renvoyée par Metarisc est incorrecte : il manque les métadonnées');
        $meta = $this->current_page['meta'];

        // Dans les "meta", on récupère les informations de pagination
        \assert(\is_array($meta), 'La pagination renvoyée par Metarisc est incorrecte : les métadonnées sont invalides');
        \assert(\array_key_exists('pagination', $meta), 'La pagination renvoyée par Metarisc est incorrecte : il manque les métadonnées de la pagination');
        $pagination = $meta['pagination'];

        // Dans les informations de pagination, on trouve le total correspondant à la requête
        \assert(\is_array($pagination), 'La pagination renvoyée par Metarisc est incorrecte : les métadonnées de la pagination sont invalides');
        \assert(\array_key_exists('total', $pagination), 'La pagination renvoyée par Metarisc est incorrecte : il manque le total dans les métadonnées de la pagination');
        $total = (int) $pagination['total'];
        \assert($total >= 0, 'La pagination renvoyée par Metarisc est incorrecte : le total est négatif');

        return $total;
    }

    /**
     * Returns a slice of the results representing the current page of items in the list.
     */
    public function getSlice(int $offset, int $length) : iterable
    {
        // Calcul du numéro de page à demander correspondant à l'offset et à au length demandés
        $page_number = (int) floor(($offset / $length) + 1);

        // Récupération de la page et on la stocke dans notre cache interne
        $this->current_page = $this->fetchPage($page_number, $length);

        // Récupération des "data" de la page
        \assert(\array_key_exists('data', $this->current_page), 'La pagination renvoyée par Metarisc est incorrecte : il manque les données');
        $data = $this->current_page['data'];
        \assert(\is_array($data), 'La pagination renvoyée par Metarisc est incorrecte : les données renvoyées sont invalides');

        return $data;
    }

    /**
     * Récupération de la page.
     */
    private function fetchPage(int $page_number, int $length) : array
    {
        $options = array_merge_recursive($this->options, [
            'query' => [
                'page'     => $page_number,
                'per_page' => $length,
            ],
        ]);

        try {
            $response = $this->metarisc->request($this->method, $this->uri, $options);

            if (str_contains($response->getHeaderLine('Content-Type'), 'application/json')) {
                $body = $response->getBody()->__toString();

                $data = json_decode($body, true, 512, \JSON_THROW_ON_ERROR);

                \assert(\is_array($data));

                return $data;
            }

            throw new \Exception('Content-Encoding non valide pour la pagination : '.$response->getHeaderLine('Content-Type'));
        } catch (\Exception $e) {
            throw new \Exception('La pagination renvoyée par Metarisc est incorrecte : '.$e->getMessage());
        }
    }
}
