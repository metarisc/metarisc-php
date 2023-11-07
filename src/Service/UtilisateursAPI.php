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

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/@moi');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\Utilisateur::unserialize($object);
    }

    /**
     * L'utilisateur connecté retourné par ce point de terminaison utilise le token d'accès généré par le service OpenID Connect afin de le lier à une identité connue de Metarisc. Si l'utilisateur est inconnu une erreur est retournée.
     */
    public function getUtilisateursMoi1() : \Metarisc\Model\Utilisateur
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
     * Liste toutes les adresses mail de l'utilisateur connecté, y compris les adresses non publiquement accessibles.
     */
    public function paginateMoiEmails() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/@moi/emails');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }

    /**
     * Liste toutes les adresses mail de l'utilisateur connecté, y compris les adresses non publiquement accessibles.
     */
    public function paginateMoiEmails1() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/utilisateurs/@moi/emails');

        return $this->pagination('GET', $path, [
            'params' => [],
        ]);
    }
}
