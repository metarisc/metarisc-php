<?php

namespace Metarisc\Service;

use Metarisc\Utils;
use Pagerfanta\Pagerfanta;
use Metarisc\MetariscAbstract;

class ContactsAPI extends MetariscAbstract
{
    /**
     * Suppression d'une fiche contact existante.
     */
    public function deleteContact(string $contact_id) : void
    {
        $table = [
            'contact_id' => $contact_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/contacts/{contact_id}');
        $this->request('DELETE', $path);
    }

    /**
     * Récupération d'une fiche contact.
     */
    public function getContact(string $contact_id) : \Metarisc\Model\Contact
    {
        $table = [
            'contact_id' => $contact_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/contacts/{contact_id}');

        $response =  $this->request('GET', $path);

        $contents = $response->getBody()->getContents();

        $object = json_decode($contents, true);
        \assert(\is_array($object));

        return \Metarisc\Model\Contact::unserialize($object);
    }

    /**
     * Récupération de la liste des contacts.
     */
    public function paginateContacts() : Pagerfanta
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/contacts');

        return $this->pagination('GET', $path, [
            'params'      => [],
            'model_class' => \Metarisc\Model\Contact::class,
        ]);
    }

    /**
     * Mise à jour d'une fiche contact existante.
     */
    public function updateContact(string $contact_id, \Metarisc\Model\Contact $contact = null) : void
    {
        $table = [
            'contact_id' => $contact_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/contacts/{contact_id}');

        $this->request('POST', $path, [
            'json' => [
                'id'                 => $contact?->getId(),
                'nom'                => $contact?->getNom(),
                'prenom'             => $contact?->getPrenom(),
                'fonction'           => $contact?->getFonction(),
                'telephone_fixe'     => $contact?->getTelephoneFixe(),
                'telephone_portable' => $contact?->getTelephonePortable(),
                'telephone_fax'      => $contact?->getTelephoneFax(),
                'adresse'            => $contact?->getAdresse(),
                'site_web_url'       => $contact?->getSiteWebUrl(),
                'civilite'           => $contact?->getCivilite(),
                'societe'            => $contact?->getSociete(),
                'email'              => $contact?->getEmail(),
                'observations'       => $contact?->getObservations(),
            ],
        ]);
    }
}
