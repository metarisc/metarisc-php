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
    public function updateContact(string $contact_id, \Metarisc\Model\ObjetContact $objet_contact = null) : void
    {
        $table = [
            'contact_id' => $contact_id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', Utils::urlEditor($table), '/contacts/{contact_id}');

        $this->request('POST', $path, [
            'json' => [
                'nom'                => $objet_contact?->getNom(),
                'prenom'             => $objet_contact?->getPrenom(),
                'fonction'           => $objet_contact?->getFonction(),
                'telephone_fixe'     => $objet_contact?->getTelephoneFixe(),
                'telephone_portable' => $objet_contact?->getTelephonePortable(),
                'telephone_fax'      => $objet_contact?->getTelephoneFax(),
                'adresse'            => $objet_contact?->getAdresse(),
                'site_web_url'       => $objet_contact?->getSiteWebUrl(),
                'civilite'           => $objet_contact?->getCivilite(),
                'societe'            => $objet_contact?->getSociete(),
                'email'              => $objet_contact?->getEmail(),
                'observations'       => $objet_contact?->getObservations(),
            ],
        ]);
    }
}
