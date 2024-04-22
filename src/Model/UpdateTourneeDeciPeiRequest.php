<?php

namespace Metarisc\Model;

class UpdateTourneeDeciPeiRequest extends ModelAbstract
{
    private ?array $liste_anomalies   = null;
    private ?string $engin_utilis     = null;
    private ?int $ordre               = null;
    private ?string $date_du_controle = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var \Metarisc\Model\AnomaliePEI[] $data['liste_anomalies'] */
        $object->setListeAnomalies($data['liste_anomalies']);

        /** @var string $data['engin_utilis'] */
        $object->setEnginUtilis($data['engin_utilis']);

        /** @var int $data['ordre'] */
        $object->setOrdre($data['ordre']);

        /** @var string $data['date_du_controle'] */
        $object->setDateDuControle($data['date_du_controle']);

        return $object;
    }

    public function getListeAnomalies() : ?array
    {
        return $this->liste_anomalies;
    }

    public function setListeAnomalies(array $liste_anomalies = null) : void
    {
        $this->liste_anomalies=$liste_anomalies;
    }

    public function getEnginUtilis() : ?string
    {
        return $this->engin_utilis;
    }

    public function setEnginUtilis(string $engin_utilis = null) : void
    {
        $this->engin_utilis=$engin_utilis;
    }

    public function getOrdre() : ?int
    {
        return $this->ordre;
    }

    public function setOrdre(int $ordre = null) : void
    {
        $this->ordre=$ordre;
    }

    public function getDateDuControle() : ?string
    {
        return $this->date_du_controle;
    }

    public function setDateDuControle(?string $date_du_controle) : void
    {
        $this->date_du_controle = $date_du_controle;
    }
}
