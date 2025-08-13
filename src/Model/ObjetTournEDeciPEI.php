<?php

namespace Metarisc\Model;

/*
 * Objet de contrôle d'un PEI dans le cadre d'une Tournée DECI
*/

class ObjetTournEDeciPEI extends ModelAbstract
{
    private ?string $date_du_controle                                   = null;
    private ?\Metarisc\Model\ObjetTournEDeciPEIHydraulique $hydraulique = null;
    private ?array $liste_anomalies                                     = null;
    private ?string $essais_engin_utilise                               = null;
    private ?int $ordre                                                 = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['date_du_controle'] */
        $object->setDateDuControle($data['date_du_controle']);

        /** @var array<array-key, mixed> $data['hydraulique'] */
        $object->setHydraulique($data['hydraulique']);

        /** @var \Metarisc\Model\ObjetTournEDeciPEIListeAnomalies[] $data['liste_anomalies'] */
        $object->setListeAnomalies($data['liste_anomalies']);

        /** @var string $data['essais_engin_utilise'] */
        $object->setEssaisEnginUtilise($data['essais_engin_utilise']);

        /** @var int $data['ordre'] */
        $object->setOrdre($data['ordre']);

        return $object;
    }

    public function getDateDuControle() : ?string
    {
        return $this->date_du_controle;
    }

    public function setDateDuControle(?string $date_du_controle) : void
    {
        $this->date_du_controle = $date_du_controle;
    }

    public function getHydraulique() : ?ObjetTournEDeciPEIHydraulique
    {
        return $this->hydraulique;
    }

    public function setHydraulique(array $hydraulique) : void
    {
        $this->hydraulique=ObjetTournEDeciPEIHydraulique::unserialize($hydraulique);
    }

    public function getListeAnomalies() : ?array
    {
        return $this->liste_anomalies;
    }

    public function setListeAnomalies(array $liste_anomalies = null) : void
    {
        $this->liste_anomalies=$liste_anomalies;
    }

    public function getEssaisEnginUtilise() : ?string
    {
        return $this->essais_engin_utilise;
    }

    public function setEssaisEnginUtilise(string $essais_engin_utilise = null) : void
    {
        $this->essais_engin_utilise=$essais_engin_utilise;
    }

    public function getOrdre() : ?int
    {
        return $this->ordre;
    }

    public function setOrdre(int $ordre = null) : void
    {
        $this->ordre=$ordre;
    }
}
