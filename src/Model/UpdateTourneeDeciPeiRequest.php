<?php

namespace Metarisc\Model;

class UpdateTourneeDeciPeiRequest extends ModelAbstract
{
    private ?string $engin_utilise    = null;
    private ?int $ordre               = null;
    private ?string $date_du_controle = null;
    private ?array $liste_anomalies   = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['engin_utilise'] */
        $object->setEnginUtilise($data['engin_utilise']);

        /** @var int $data['ordre'] */
        $object->setOrdre($data['ordre']);

        /** @var string $data['date_du_controle'] */
        $object->setDateDuControle($data['date_du_controle']);

        /** @var \Metarisc\Model\UpdateTourneeDeciPeiRequestListeAnomaliesInner[] $data['liste_anomalies'] */
        $object->setListeAnomalies($data['liste_anomalies']);

        return $object;
    }

    public function getEnginUtilise() : ?string
    {
        return $this->engin_utilise;
    }

    public function setEnginUtilise(string $engin_utilise = null) : void
    {
        $this->engin_utilise=$engin_utilise;
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

    public function getListeAnomalies() : ?array
    {
        return $this->liste_anomalies;
    }

    public function setListeAnomalies(array $liste_anomalies = null) : void
    {
        $this->liste_anomalies=$liste_anomalies;
    }
}
