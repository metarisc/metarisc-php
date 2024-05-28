<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class UtilisateursAPI extends MetariscAbstract
{
    /**
     * L'utilisateur connecté retourné par ce point de terminaison utilise le token d'accès généré par le service OpenID Connect afin de le lier à une identité connue de Metarisc. Si l'utilisateur est inconnu une erreur est retournée.
     */
    public function getUtilisateursMoi() : \Metarisc\Model\Utilisateur
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/utilisateurs/@moi');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\Utilisateur::unserialize($object);
    }

    /**
     * Retourne un utilisateur Metarisc.
     */
    public function getUtilisateurDetails(string $utilisateur_id) : \Metarisc\Model\Utilisateur
    {
        $table = [
            'utilisateur_id' => $utilisateur_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/utilisateurs/{utilisateur_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\Utilisateur::unserialize($object);
    }

    /**
     * Liste toutes les adresses mail de l'utilisateur connecté, y compris les adresses non publiquement accessibles.
     */
    public function paginateMoiEmails() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/utilisateurs/@moi/emails');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Email::class,
        ]);
    }

    /**
     * Retourne une liste des adresses mail publiques d'un utilisateur.
     */
    public function paginateUtilisateurEmails(string $utilisateur_id) : Pagerfanta
    {
        $table = [
            'utilisateur_id' => $utilisateur_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/utilisateurs/{utilisateur_id}/emails');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Email::class,
        ]);
    }

    /**
     * Retourne une liste d'organisations dont l'utilisateur est membre.
     */
    public function paginateUtilisateurOrganisations(string $utilisateur_id) : Pagerfanta
    {
        $table = [
            'utilisateur_id' => $utilisateur_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/utilisateurs/{utilisateur_id}/organisations');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\OrganisationMembre::class,
        ]);
    }
}
