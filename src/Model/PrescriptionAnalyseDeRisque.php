<?php

namespace Metarisc\Model;

/*
 * Liaison entre une prescription et une analyse de risque sur un dossier. Elle est motivée par un facteur de dangerosité et des mesures compensatoires et complémentaires.
*/

class PrescriptionAnalyseDeRisque extends Prescription
{
    private ?int $numero = null;

    public function getNumero() : ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero) : void
    {
        $this->numero=$numero;
    }
}
