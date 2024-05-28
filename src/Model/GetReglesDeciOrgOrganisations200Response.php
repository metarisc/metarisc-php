<?php

namespace Metarisc\Model;

class GetReglesDeciOrgOrganisations200Response extends ModelAbstract
{
    private ?array $pibi_conformite_matrice_seuil_pesee_1bar_par_nature = null;
    private ?array $pibi_performance_natures_performance_restreinte     = null;
    private ?array $pibi_performance_natures_a_reformer                 = null;
    private ?int $pibi_performance_seuil_pesee_1bar                     = null;
    private ?int $pibi_conformite_seuil_surpression                     = null;
    private ?int $pibi_conformite_matrice_seuil_pesee_1bar_par_defaut   = null;
    private ?int $pena_conformite_seuil_volume_citerne                  = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var array $data['pibi_conformite_matrice_seuil_pesee_1bar_par_nature'] */
        $object->setPibiConformiteMatriceSeuilPesee1barParNature($data['pibi_conformite_matrice_seuil_pesee_1bar_par_nature']);

        /** @var string[] $data['pibi_performance_natures_performance_restreinte'] */
        $object->setPibiPerformanceNaturesPerformanceRestreinte($data['pibi_performance_natures_performance_restreinte']);

        /** @var string[] $data['pibi_performance_natures_a_reformer'] */
        $object->setPibiPerformanceNaturesAReformer($data['pibi_performance_natures_a_reformer']);

        /** @var int $data['pibi_performance_seuil_pesee_1bar'] */
        $object->setPibiPerformanceSeuilPesee1bar($data['pibi_performance_seuil_pesee_1bar']);

        /** @var int $data['pibi_conformite_seuil_surpression'] */
        $object->setPibiConformiteSeuilSurpression($data['pibi_conformite_seuil_surpression']);

        /** @var int $data['pibi_conformite_matrice_seuil_pesee_1bar_par_defaut'] */
        $object->setPibiConformiteMatriceSeuilPesee1barParDefaut($data['pibi_conformite_matrice_seuil_pesee_1bar_par_defaut']);

        /** @var int $data['pena_conformite_seuil_volume_citerne'] */
        $object->setPenaConformiteSeuilVolumeCiterne($data['pena_conformite_seuil_volume_citerne']);

        return $object;
    }

    public function getPibiConformiteMatriceSeuilPesee1barParNature() : ?array
    {
        return $this->pibi_conformite_matrice_seuil_pesee_1bar_par_nature;
    }

    public function setPibiConformiteMatriceSeuilPesee1barParNature(array $pibi_conformite_matrice_seuil_pesee_1bar_par_nature = null) : void
    {
        $this->pibi_conformite_matrice_seuil_pesee_1bar_par_nature=$pibi_conformite_matrice_seuil_pesee_1bar_par_nature;
    }

    public function getPibiPerformanceNaturesPerformanceRestreinte() : ?array
    {
        return $this->pibi_performance_natures_performance_restreinte;
    }

    public function setPibiPerformanceNaturesPerformanceRestreinte(array $pibi_performance_natures_performance_restreinte = null) : void
    {
        $this->pibi_performance_natures_performance_restreinte=$pibi_performance_natures_performance_restreinte;
    }

    public function getPibiPerformanceNaturesAReformer() : ?array
    {
        return $this->pibi_performance_natures_a_reformer;
    }

    public function setPibiPerformanceNaturesAReformer(array $pibi_performance_natures_a_reformer = null) : void
    {
        $this->pibi_performance_natures_a_reformer=$pibi_performance_natures_a_reformer;
    }

    public function getPibiPerformanceSeuilPesee1bar() : ?int
    {
        return $this->pibi_performance_seuil_pesee_1bar;
    }

    public function setPibiPerformanceSeuilPesee1bar(int $pibi_performance_seuil_pesee_1bar = null) : void
    {
        $this->pibi_performance_seuil_pesee_1bar=$pibi_performance_seuil_pesee_1bar;
    }

    public function getPibiConformiteSeuilSurpression() : ?int
    {
        return $this->pibi_conformite_seuil_surpression;
    }

    public function setPibiConformiteSeuilSurpression(int $pibi_conformite_seuil_surpression = null) : void
    {
        $this->pibi_conformite_seuil_surpression=$pibi_conformite_seuil_surpression;
    }

    public function getPibiConformiteMatriceSeuilPesee1barParDefaut() : ?int
    {
        return $this->pibi_conformite_matrice_seuil_pesee_1bar_par_defaut;
    }

    public function setPibiConformiteMatriceSeuilPesee1barParDefaut(int $pibi_conformite_matrice_seuil_pesee_1bar_par_defaut = null) : void
    {
        $this->pibi_conformite_matrice_seuil_pesee_1bar_par_defaut=$pibi_conformite_matrice_seuil_pesee_1bar_par_defaut;
    }

    public function getPenaConformiteSeuilVolumeCiterne() : ?int
    {
        return $this->pena_conformite_seuil_volume_citerne;
    }

    public function setPenaConformiteSeuilVolumeCiterne(int $pena_conformite_seuil_volume_citerne = null) : void
    {
        $this->pena_conformite_seuil_volume_citerne=$pena_conformite_seuil_volume_citerne;
    }
}
