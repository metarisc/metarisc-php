<?php

namespace Metarisc\Model;

class TourneeDeciPei extends ModelAbstract
{
    private ?string $id                   = null;
    private ?string $date_du_controle     = null;
    private ?array $liste_anomalies       = null;
    private ?string $essais_engin_utilise = null;
    private ?\Metarisc\Model\PEI $pei     = null;
    private ?bool $est_controle           = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['id'] */
        $object->setId($data['id']);

        /** @var string $data['date_du_controle'] */
        $object->setDateDuControle($data['date_du_controle']);

        /** @var \Metarisc\Model\AnomaliePEI[] $data['liste_anomalies'] */
        $object->setListeAnomalies($data['liste_anomalies']);

        /** @var string $data['essais_engin_utilise'] */
        $object->setEssaisEnginUtilise($data['essais_engin_utilise']);

        /** @var array<array-key, mixed> $data['pei'] */
        $object->setPei($data['pei']);

        /** @var bool $data['est_controle'] */
        $object->setEstControle($data['est_controle']);

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
}
