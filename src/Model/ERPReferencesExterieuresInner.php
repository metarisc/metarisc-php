<?php

namespace Metarisc\Model;

class ERPReferencesExterieuresInner extends ModelAbstract
{
    private ?string $titre  = null;
    private ?string $valeur = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['titre'] */
        $object->setTitre($data['titre']);

        /** @var string $data['valeur'] */
        $object->setValeur($data['valeur']);

        return $object;
    }

    public function getTitre() : ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre = null) : void
    {
        $this->titre=$titre;
    }

    public function getValeur() : ?string
    {
        return $this->valeur;
    }

    public function setValeur(string $valeur = null) : void
    {
        $this->valeur=$valeur;
    }
}
