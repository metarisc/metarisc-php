<?php

namespace Metarisc\Model;

class FeedMessageTexte extends FeedMessageBase
{
    private ?string $texte = null;

    public function getTexte() : ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte) : void
    {
        $this->texte=$texte;
    }
}
