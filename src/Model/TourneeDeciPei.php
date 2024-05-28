<?php

namespace Metarisc\Model;

class TourneeDeciPei extends ModelAbstract
{
    private ?string $id                   = null;
    private ?string $date_du_controle     = null;
    private ?array $liste_anomalies       = null;
    private ?string $essais_engin_utilise = null;
    private ?string $pei_id               = null;
    private ?\Metarisc\Model\PEI $pei     = null;
    private ?bool $est_controle           = null;
    private ?int $ordre                   = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['date_du_controle'] */
        $object->setDateDuControle($data['date_du_controle']);

        /** @var \Metarisc\Model\TourneeDeciPeiListeAnomaliesInner[] $data['liste_anomalies'] */
        $object->setListeAnomalies($data['liste_anomalies']);

        /** @var string $data['essais_engin_utilise'] */
        $object->setEssaisEnginUtilise($data['essais_engin_utilise']);

        /** @var string $data['pei_id'] */
        $object->setPeiId($data['pei_id']);

        /** @var array<array-key, mixed> $data['pei'] */
        $object->setPei($data['pei']);

        /** @var bool $data['est_controle'] */
        $object->setEstControle($data['est_controle']);

        /** @var int $data['ordre'] */
        $object->setOrdre($data['ordre']);

        return $object;
    }

    public function getId() : ?string
    {
        return $this->id;
    }

    public function setId(string $id = null) : void
    {
        $this->id=$id;
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

    public function getEssaisEnginUtilise() : ?string
    {
        return $this->essais_engin_utilise;
    }

    public function setEssaisEnginUtilise(string $essais_engin_utilise = null) : void
    {
        $this->essais_engin_utilise=$essais_engin_utilise;
    }

    public function getPeiId() : ?string
    {
        return $this->pei_id;
    }

    public function setPeiId(string $pei_id = null) : void
    {
        $this->pei_id=$pei_id;
    }

    public function getPei() : ?PEI
    {
        return $this->pei;
    }

    public function setPei(array $pei) : void
    {
        $this->pei=PEI::unserialize($pei);
    }

    public function getEstControle() : ?bool
    {
        return $this->est_controle;
    }

    public function setEstControle(bool $est_controle = null) : void
    {
        $this->est_controle=$est_controle;
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
