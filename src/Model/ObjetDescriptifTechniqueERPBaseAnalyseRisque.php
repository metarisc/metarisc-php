<?php

namespace Metarisc\Model;

/*
 * Analyse des risques de l'établissement.
*/

class ObjetDescriptifTechniqueERPBaseAnalyseRisque extends ModelAbstract
{
    private ?string $activite_principale                                                       = null;
    private ?array $activites_secondaire                                                       = null;
    private ?int $categorie                                                                    = null;
    private ?string $groupement_etablissement                                                  = null;
    private ?array $tableau_des_effectifs                                                      = null;
    private ?int $effectif_public                                                              = null;
    private ?int $effectif_personnel                                                           = null;
    private ?bool $presence_locaux_sommeil                                                     = null;
    private ?bool $presence_locaux_sommeil_au_dessus_r1                                        = null;
    private ?int $niveau_total                                                                 = null;
    private ?int $surface_totale                                                               = null;
    private ?int $surface_accessible_au_public                                                 = null;
    private ?bool $r143_20                                                                     = null;
    private ?int $batiment_etages_en_superstructure                                            = null;
    private ?int $batiment_etages_en_infrastructure                                            = null;
    private ?bool $etablissement_de_plain_pied                                                 = null;
    private ?string $plancher_bas_du_dernier_niveau                                            = null;
    private ?string $plancher_bas_du_dernier_niveau_accessible_au_public                       = null;
    private ?bool $voie_engin                                                                  = null;
    private ?int $nombre_voies_engins                                                          = null;
    private ?bool $voie_echelle                                                                = null;
    private ?int $nombre_facades_accessibles                                                   = null;
    private ?string $informations_acces_facades                                                = null;
    private ?bool $espace_libre                                                                = null;
    private ?string $desserte_informations_complementaires                                     = null;
    private ?bool $presence_erp_ou_tiers_contigus                                              = null;
    private ?string $isolement_contigus_realise_degre_cf                                       = null;
    private ?string $isolement_contigus_realise_degre_cf_autre_precision                       = null;
    private ?string $isolement_contigus_informations_complementaires                           = null;
    private ?string $air_libre                                                                 = null;
    private ?string $vis_a_vis                                                                 = null;
    private ?string $isolement_vis_a_vis_informations_complementaires                          = null;
    private ?bool $presence_erp_ou_tiers_superpose                                             = null;
    private ?string $isolement_superpose_realise_degre_cf                                      = null;
    private ?string $isolement_superpose_realise_degre_cf_autre_precision                      = null;
    private ?string $isolement_superpose_informations_complementaires                          = null;
    private ?string $structure_sf                                                              = null;
    private ?string $plancher_sf                                                               = null;
    private ?string $stabilite_au_feu_informations_complementaires                             = null;
    private ?string $isolement_autre_description                                               = null;
    private ?string $construction_structures_description                                       = null;
    private ?string $construction_couverture_description                                       = null;
    private ?string $construction_facades_description                                          = null;
    private ?array $type_cloisonnement                                                         = null;
    private ?string $construction_distribution_interieure_informations_complementaires         = null;
    private ?array $locaux                                                                     = null;
    private ?string $construction_conduits_et_gaines_description                               = null;
    private ?string $construction_amenagements_interieurs_description                          = null;
    private ?array $degagement_normaux                                                         = null;
    private ?array $degagements_accessoires                                                    = null;
    private ?string $degagement_exigibles_informations_complementaires                         = null;
    private ?array $degagement_supplementaires                                                 = null;
    private ?string $degagement_escaliers_description                                          = null;
    private ?string $degagement_ascenseurs_escaliers_mecaniques_trottoirs_roulants_description = null;
    private ?bool $presence_eas_ou_equivalents                                                 = null;
    private ?string $evacuation_personnes_situation_handicap_observation                       = null;
    private ?string $degagement_espaces_attente_securises_informations_complementaires         = null;
    private ?string $degagement_tribunes_et_gradins_non_demontables_description                = null;
    private ?bool $enfouissement                                                               = null;
    private ?string $degagement_enfouissement_informations_complementaires                     = null;
    private ?bool $presence_desenfumage_mcanique                                               = null;
    private ?bool $presence_desenfumage_naturel                                                = null;
    private ?string $ventilation_desenfumage_informations_complementaires                      = null;
    private ?bool $groupe_electrogene                                                          = null;
    private ?bool $batteries_accumulateurs_et_materiels_associes                               = null;
    private ?bool $photovoltaique                                                              = null;
    private ?bool $parafoudre                                                                  = null;
    private ?string $electricite_eclairage_informations_complementaires                        = null;
    private ?string $puissance_chaufferie                                                      = null;
    private ?bool $presence_gaz_chaufferie                                                     = null;
    private ?array $type_de_chauffage                                                          = null;
    private ?string $chauffage_ventilation_informations_complementaires                        = null;
    private ?string $puissance_cuisine                                                         = null;
    private ?string $type_de_cuisine                                                           = null;
    private ?bool $presence_gaz_cuisine                                                        = null;
    private ?string $systeme_ventilation                                                       = null;
    private ?string $risques_spciaux_informations_complementaires                              = null;
    private ?bool $presence_extincteur                                                         = null;
    private ?bool $presence_ria                                                                = null;
    private ?bool $deversoirs_ponctuels                                                        = null;
    private ?bool $elements_de_constructions_irrigues                                          = null;
    private ?bool $presence_deci                                                               = null;
    private ?bool $presence_colonnes_seches                                                    = null;
    private ?bool $presence_colonnes_en_charge                                                 = null;
    private ?string $installation_extinction                                                   = null;
    private ?string $moyens_de_secours_informations_complementaires                            = null;
    private ?string $deci_description                                                          = null;
    private ?bool $affichage_des_plans_intervention                                            = null;
    private ?bool $affichage_des_consignes_de_securite                                         = null;
    private ?bool $tour_incendie                                                               = null;
    private ?bool $tremie_attaque                                                              = null;
    private ?string $service_de_securite_incendie                                              = null;
    private ?bool $presence_pc_securite                                                        = null;
    private ?string $service_de_securite_incendie_informations_complementaires                 = null;
    private ?bool $systeme_de_securite_incendie                                                = null;
    private ?string $type_ssi                                                                  = null;
    private ?string $type_alarme                                                               = null;
    private ?int $temporisation_alarme_en_minutes                                              = null;
    private ?bool $desenfumage_commande_par_le_ssi                                             = null;
    private ?bool $ligne_telephonique_reliee_au_cta                                            = null;
    private ?string $autre_systeme_alerte                                                      = null;
    private ?string $systeme_securite_incendie_informations_complementaires                    = null;
    private ?bool $defibrillateur                                                              = null;
    private ?string $specificites_informations_complementaires                                 = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['activite_principale'] */
        $object->setActivitePrincipale($data['activite_principale']);

        /** @var string[] $data['activites_secondaire'] */
        $object->setActivitesSecondaire($data['activites_secondaire']);

        /** @var int $data['categorie'] */
        $object->setCategorie($data['categorie']);

        /** @var string $data['groupement_etablissement'] */
        $object->setGroupementEtablissement($data['groupement_etablissement']);

        /** @var \Metarisc\Model\ObjetEffectifsDuNiveau[] $data['tableau_des_effectifs'] */
        $object->setTableauDesEffectifs($data['tableau_des_effectifs']);

        /** @var int $data['effectif_public'] */
        $object->setEffectifPublic($data['effectif_public']);

        /** @var int $data['effectif_personnel'] */
        $object->setEffectifPersonnel($data['effectif_personnel']);

        /** @var bool $data['presence_locaux_sommeil'] */
        $object->setPresenceLocauxSommeil($data['presence_locaux_sommeil']);

        /** @var bool $data['presence_locaux_sommeil_au_dessus_r1'] */
        $object->setPresenceLocauxSommeilAuDessusR1($data['presence_locaux_sommeil_au_dessus_r1']);

        /** @var int $data['niveau_total'] */
        $object->setNiveauTotal($data['niveau_total']);

        /** @var int $data['surface_totale'] */
        $object->setSurfaceTotale($data['surface_totale']);

        /** @var int $data['surface_accessible_au_public'] */
        $object->setSurfaceAccessibleAuPublic($data['surface_accessible_au_public']);

        /** @var bool $data['r143_20'] */
        $object->setR14320($data['r143_20']);

        /** @var int $data['batiment_etages_en_superstructure'] */
        $object->setBatimentEtagesEnSuperstructure($data['batiment_etages_en_superstructure']);

        /** @var int $data['batiment_etages_en_infrastructure'] */
        $object->setBatimentEtagesEnInfrastructure($data['batiment_etages_en_infrastructure']);

        /** @var bool $data['etablissement_de_plain_pied'] */
        $object->setEtablissementDePlainPied($data['etablissement_de_plain_pied']);

        /** @var string $data['plancher_bas_du_dernier_niveau'] */
        $object->setPlancherBasDuDernierNiveau($data['plancher_bas_du_dernier_niveau']);

        /** @var string $data['plancher_bas_du_dernier_niveau_accessible_au_public'] */
        $object->setPlancherBasDuDernierNiveauAccessibleAuPublic($data['plancher_bas_du_dernier_niveau_accessible_au_public']);

        /** @var bool $data['voie_engin'] */
        $object->setVoieEngin($data['voie_engin']);

        /** @var int $data['nombre_voies_engins'] */
        $object->setNombreVoiesEngins($data['nombre_voies_engins']);

        /** @var bool $data['voie_echelle'] */
        $object->setVoieEchelle($data['voie_echelle']);

        /** @var int $data['nombre_facades_accessibles'] */
        $object->setNombreFacadesAccessibles($data['nombre_facades_accessibles']);

        /** @var string $data['informations_acces_facades'] */
        $object->setInformationsAccesFacades($data['informations_acces_facades']);

        /** @var bool $data['espace_libre'] */
        $object->setEspaceLibre($data['espace_libre']);

        /** @var string $data['desserte_informations_complementaires'] */
        $object->setDesserteInformationsComplementaires($data['desserte_informations_complementaires']);

        /** @var bool $data['presence_erp_ou_tiers_contigus'] */
        $object->setPresenceErpOuTiersContigus($data['presence_erp_ou_tiers_contigus']);

        /** @var string $data['isolement_contigus_realise_degre_cf'] */
        $object->setIsolementContigusRealiseDegreCf($data['isolement_contigus_realise_degre_cf']);

        /** @var string $data['isolement_contigus_realise_degre_cf_autre_precision'] */
        $object->setIsolementContigusRealiseDegreCfAutrePrecision($data['isolement_contigus_realise_degre_cf_autre_precision']);

        /** @var string $data['isolement_contigus_informations_complementaires'] */
        $object->setIsolementContigusInformationsComplementaires($data['isolement_contigus_informations_complementaires']);

        /** @var string $data['air_libre'] */
        $object->setAirLibre($data['air_libre']);

        /** @var string $data['vis_a_vis'] */
        $object->setVisAVis($data['vis_a_vis']);

        /** @var string $data['isolement_vis_a_vis_informations_complementaires'] */
        $object->setIsolementVisAVisInformationsComplementaires($data['isolement_vis_a_vis_informations_complementaires']);

        /** @var bool $data['presence_erp_ou_tiers_superpose'] */
        $object->setPresenceErpOuTiersSuperpose($data['presence_erp_ou_tiers_superpose']);

        /** @var string $data['isolement_superpose_realise_degre_cf'] */
        $object->setIsolementSuperposeRealiseDegreCf($data['isolement_superpose_realise_degre_cf']);

        /** @var string $data['isolement_superpose_realise_degre_cf_autre_precision'] */
        $object->setIsolementSuperposeRealiseDegreCfAutrePrecision($data['isolement_superpose_realise_degre_cf_autre_precision']);

        /** @var string $data['isolement_superpose_informations_complementaires'] */
        $object->setIsolementSuperposeInformationsComplementaires($data['isolement_superpose_informations_complementaires']);

        /** @var string $data['structure_sf'] */
        $object->setStructureSf($data['structure_sf']);

        /** @var string $data['plancher_sf'] */
        $object->setPlancherSf($data['plancher_sf']);

        /** @var string $data['stabilite_au_feu_informations_complementaires'] */
        $object->setStabiliteAuFeuInformationsComplementaires($data['stabilite_au_feu_informations_complementaires']);

        /** @var string $data['isolement_autre_description'] */
        $object->setIsolementAutreDescription($data['isolement_autre_description']);

        /** @var string $data['construction_structures_description'] */
        $object->setConstructionStructuresDescription($data['construction_structures_description']);

        /** @var string $data['construction_couverture_description'] */
        $object->setConstructionCouvertureDescription($data['construction_couverture_description']);

        /** @var string $data['construction_facades_description'] */
        $object->setConstructionFacadesDescription($data['construction_facades_description']);

        /** @var string[] $data['type_cloisonnement'] */
        $object->setTypeCloisonnement($data['type_cloisonnement']);

        /** @var string $data['construction_distribution_interieure_informations_complementaires'] */
        $object->setConstructionDistributionInterieureInformationsComplementaires($data['construction_distribution_interieure_informations_complementaires']);

        /** @var \Metarisc\Model\ObjetLocal[] $data['locaux'] */
        $object->setLocaux($data['locaux']);

        /** @var string $data['construction_conduits_et_gaines_description'] */
        $object->setConstructionConduitsEtGainesDescription($data['construction_conduits_et_gaines_description']);

        /** @var string $data['construction_amenagements_interieurs_description'] */
        $object->setConstructionAmenagementsInterieursDescription($data['construction_amenagements_interieurs_description']);

        /** @var \Metarisc\Model\ObjetDGagement[] $data['degagement_normaux'] */
        $object->setDegagementNormaux($data['degagement_normaux']);

        /** @var \Metarisc\Model\ObjetDGagement[] $data['degagements_accessoires'] */
        $object->setDegagementsAccessoires($data['degagements_accessoires']);

        /** @var string $data['degagement_exigibles_informations_complementaires'] */
        $object->setDegagementExigiblesInformationsComplementaires($data['degagement_exigibles_informations_complementaires']);

        /** @var \Metarisc\Model\ObjetDGagement[] $data['degagement_supplementaires'] */
        $object->setDegagementSupplementaires($data['degagement_supplementaires']);

        /** @var string $data['degagement_escaliers_description'] */
        $object->setDegagementEscaliersDescription($data['degagement_escaliers_description']);

        /** @var string $data['degagement_ascenseurs_escaliers_mecaniques_trottoirs_roulants_description'] */
        $object->setDegagementAscenseursEscaliersMecaniquesTrottoirsRoulantsDescription($data['degagement_ascenseurs_escaliers_mecaniques_trottoirs_roulants_description']);

        /** @var bool $data['presence_eas_ou_equivalents'] */
        $object->setPresenceEasOuEquivalents($data['presence_eas_ou_equivalents']);

        /** @var string $data['evacuation_personnes_situation_handicap_observation'] */
        $object->setEvacuationPersonnesSituationHandicapObservation($data['evacuation_personnes_situation_handicap_observation']);

        /** @var string $data['degagement_espaces_attente_securises_informations_complementaires'] */
        $object->setDegagementEspacesAttenteSecurisesInformationsComplementaires($data['degagement_espaces_attente_securises_informations_complementaires']);

        /** @var string $data['degagement_tribunes_et_gradins_non_demontables_description'] */
        $object->setDegagementTribunesEtGradinsNonDemontablesDescription($data['degagement_tribunes_et_gradins_non_demontables_description']);

        /** @var bool $data['enfouissement'] */
        $object->setEnfouissement($data['enfouissement']);

        /** @var string $data['degagement_enfouissement_informations_complementaires'] */
        $object->setDegagementEnfouissementInformationsComplementaires($data['degagement_enfouissement_informations_complementaires']);

        /** @var bool $data['presence_desenfumage_mcanique'] */
        $object->setPresenceDesenfumageMcanique($data['presence_desenfumage_mcanique']);

        /** @var bool $data['presence_desenfumage_naturel'] */
        $object->setPresenceDesenfumageNaturel($data['presence_desenfumage_naturel']);

        /** @var string $data['ventilation_desenfumage_informations_complementaires'] */
        $object->setVentilationDesenfumageInformationsComplementaires($data['ventilation_desenfumage_informations_complementaires']);

        /** @var bool $data['groupe_electrogene'] */
        $object->setGroupeElectrogene($data['groupe_electrogene']);

        /** @var bool $data['batteries_accumulateurs_et_materiels_associes'] */
        $object->setBatteriesAccumulateursEtMaterielsAssocies($data['batteries_accumulateurs_et_materiels_associes']);

        /** @var bool $data['photovoltaique'] */
        $object->setPhotovoltaique($data['photovoltaique']);

        /** @var bool $data['parafoudre'] */
        $object->setParafoudre($data['parafoudre']);

        /** @var string $data['electricite_eclairage_informations_complementaires'] */
        $object->setElectriciteEclairageInformationsComplementaires($data['electricite_eclairage_informations_complementaires']);

        /** @var string $data['puissance_chaufferie'] */
        $object->setPuissanceChaufferie($data['puissance_chaufferie']);

        /** @var bool $data['presence_gaz_chaufferie'] */
        $object->setPresenceGazChaufferie($data['presence_gaz_chaufferie']);

        /** @var string[] $data['type_de_chauffage'] */
        $object->setTypeDeChauffage($data['type_de_chauffage']);

        /** @var string $data['chauffage_ventilation_informations_complementaires'] */
        $object->setChauffageVentilationInformationsComplementaires($data['chauffage_ventilation_informations_complementaires']);

        /** @var string $data['puissance_cuisine'] */
        $object->setPuissanceCuisine($data['puissance_cuisine']);

        /** @var string $data['type_de_cuisine'] */
        $object->setTypeDeCuisine($data['type_de_cuisine']);

        /** @var bool $data['presence_gaz_cuisine'] */
        $object->setPresenceGazCuisine($data['presence_gaz_cuisine']);

        /** @var string $data['systeme_ventilation'] */
        $object->setSystemeVentilation($data['systeme_ventilation']);

        /** @var string $data['risques_spciaux_informations_complementaires'] */
        $object->setRisquesSpciauxInformationsComplementaires($data['risques_spciaux_informations_complementaires']);

        /** @var bool $data['presence_extincteur'] */
        $object->setPresenceExtincteur($data['presence_extincteur']);

        /** @var bool $data['presence_ria'] */
        $object->setPresenceRia($data['presence_ria']);

        /** @var bool $data['deversoirs_ponctuels'] */
        $object->setDeversoirsPonctuels($data['deversoirs_ponctuels']);

        /** @var bool $data['elements_de_constructions_irrigues'] */
        $object->setElementsDeConstructionsIrrigues($data['elements_de_constructions_irrigues']);

        /** @var bool $data['presence_deci'] */
        $object->setPresenceDeci($data['presence_deci']);

        /** @var bool $data['presence_colonnes_seches'] */
        $object->setPresenceColonnesSeches($data['presence_colonnes_seches']);

        /** @var bool $data['presence_colonnes_en_charge'] */
        $object->setPresenceColonnesEnCharge($data['presence_colonnes_en_charge']);

        /** @var string $data['installation_extinction'] */
        $object->setInstallationExtinction($data['installation_extinction']);

        /** @var string $data['moyens_de_secours_informations_complementaires'] */
        $object->setMoyensDeSecoursInformationsComplementaires($data['moyens_de_secours_informations_complementaires']);

        /** @var string $data['deci_description'] */
        $object->setDeciDescription($data['deci_description']);

        /** @var bool $data['affichage_des_plans_intervention'] */
        $object->setAffichageDesPlansIntervention($data['affichage_des_plans_intervention']);

        /** @var bool $data['affichage_des_consignes_de_securite'] */
        $object->setAffichageDesConsignesDeSecurite($data['affichage_des_consignes_de_securite']);

        /** @var bool $data['tour_incendie'] */
        $object->setTourIncendie($data['tour_incendie']);

        /** @var bool $data['tremie_attaque'] */
        $object->setTremieAttaque($data['tremie_attaque']);

        /** @var string $data['service_de_securite_incendie'] */
        $object->setServiceDeSecuriteIncendie($data['service_de_securite_incendie']);

        /** @var bool $data['presence_pc_securite'] */
        $object->setPresencePcSecurite($data['presence_pc_securite']);

        /** @var string $data['service_de_securite_incendie_informations_complementaires'] */
        $object->setServiceDeSecuriteIncendieInformationsComplementaires($data['service_de_securite_incendie_informations_complementaires']);

        /** @var bool $data['systeme_de_securite_incendie'] */
        $object->setSystemeDeSecuriteIncendie($data['systeme_de_securite_incendie']);

        /** @var string $data['type_ssi'] */
        $object->setTypeSsi($data['type_ssi']);

        /** @var string $data['type_alarme'] */
        $object->setTypeAlarme($data['type_alarme']);

        /** @var int $data['temporisation_alarme_en_minutes'] */
        $object->setTemporisationAlarmeEnMinutes($data['temporisation_alarme_en_minutes']);

        /** @var bool $data['desenfumage_commande_par_le_ssi'] */
        $object->setDesenfumageCommandeParLeSsi($data['desenfumage_commande_par_le_ssi']);

        /** @var bool $data['ligne_telephonique_reliee_au_cta'] */
        $object->setLigneTelephoniqueRelieeAuCta($data['ligne_telephonique_reliee_au_cta']);

        /** @var string $data['autre_systeme_alerte'] */
        $object->setAutreSystemeAlerte($data['autre_systeme_alerte']);

        /** @var string $data['systeme_securite_incendie_informations_complementaires'] */
        $object->setSystemeSecuriteIncendieInformationsComplementaires($data['systeme_securite_incendie_informations_complementaires']);

        /** @var bool $data['defibrillateur'] */
        $object->setDefibrillateur($data['defibrillateur']);

        /** @var string $data['specificites_informations_complementaires'] */
        $object->setSpecificitesInformationsComplementaires($data['specificites_informations_complementaires']);

        return $object;
    }

    public function getActivitePrincipale() : ?string
    {
        return $this->activite_principale;
    }

    public function setActivitePrincipale(string $activite_principale = null) : void
    {
        $this->activite_principale=$activite_principale;
    }

    public function getActivitesSecondaire() : ?array
    {
        return $this->activites_secondaire;
    }

    public function setActivitesSecondaire(array $activites_secondaire = null) : void
    {
        $this->activites_secondaire=$activites_secondaire;
    }

    public function getCategorie() : ?int
    {
        return $this->categorie;
    }

    public function setCategorie(int $categorie = null) : void
    {
        $this->categorie=$categorie;
    }

    public function getGroupementEtablissement() : ?string
    {
        return $this->groupement_etablissement;
    }

    public function setGroupementEtablissement(string $groupement_etablissement = null) : void
    {
        $this->groupement_etablissement=$groupement_etablissement;
    }

    public function getTableauDesEffectifs() : ?array
    {
        return $this->tableau_des_effectifs;
    }

    public function setTableauDesEffectifs(array $tableau_des_effectifs = null) : void
    {
        $this->tableau_des_effectifs=$tableau_des_effectifs;
    }

    public function getEffectifPublic() : ?int
    {
        return $this->effectif_public;
    }

    public function setEffectifPublic(int $effectif_public = null) : void
    {
        $this->effectif_public=$effectif_public;
    }

    public function getEffectifPersonnel() : ?int
    {
        return $this->effectif_personnel;
    }

    public function setEffectifPersonnel(int $effectif_personnel = null) : void
    {
        $this->effectif_personnel=$effectif_personnel;
    }

    public function getPresenceLocauxSommeil() : ?bool
    {
        return $this->presence_locaux_sommeil;
    }

    public function setPresenceLocauxSommeil(bool $presence_locaux_sommeil = null) : void
    {
        $this->presence_locaux_sommeil=$presence_locaux_sommeil;
    }

    public function getPresenceLocauxSommeilAuDessusR1() : ?bool
    {
        return $this->presence_locaux_sommeil_au_dessus_r1;
    }

    public function setPresenceLocauxSommeilAuDessusR1(bool $presence_locaux_sommeil_au_dessus_r1 = null) : void
    {
        $this->presence_locaux_sommeil_au_dessus_r1=$presence_locaux_sommeil_au_dessus_r1;
    }

    public function getNiveauTotal() : ?int
    {
        return $this->niveau_total;
    }

    public function setNiveauTotal(int $niveau_total = null) : void
    {
        $this->niveau_total=$niveau_total;
    }

    public function getSurfaceTotale() : ?int
    {
        return $this->surface_totale;
    }

    public function setSurfaceTotale(int $surface_totale = null) : void
    {
        $this->surface_totale=$surface_totale;
    }

    public function getSurfaceAccessibleAuPublic() : ?int
    {
        return $this->surface_accessible_au_public;
    }

    public function setSurfaceAccessibleAuPublic(int $surface_accessible_au_public = null) : void
    {
        $this->surface_accessible_au_public=$surface_accessible_au_public;
    }

    public function getR14320() : ?bool
    {
        return $this->r143_20;
    }

    public function setR14320(bool $r143_20 = null) : void
    {
        $this->r143_20=$r143_20;
    }

    public function getBatimentEtagesEnSuperstructure() : ?int
    {
        return $this->batiment_etages_en_superstructure;
    }

    public function setBatimentEtagesEnSuperstructure(int $batiment_etages_en_superstructure = null) : void
    {
        $this->batiment_etages_en_superstructure=$batiment_etages_en_superstructure;
    }

    public function getBatimentEtagesEnInfrastructure() : ?int
    {
        return $this->batiment_etages_en_infrastructure;
    }

    public function setBatimentEtagesEnInfrastructure(int $batiment_etages_en_infrastructure = null) : void
    {
        $this->batiment_etages_en_infrastructure=$batiment_etages_en_infrastructure;
    }

    public function getEtablissementDePlainPied() : ?bool
    {
        return $this->etablissement_de_plain_pied;
    }

    public function setEtablissementDePlainPied(bool $etablissement_de_plain_pied = null) : void
    {
        $this->etablissement_de_plain_pied=$etablissement_de_plain_pied;
    }

    public function getPlancherBasDuDernierNiveau() : ?string
    {
        return $this->plancher_bas_du_dernier_niveau;
    }

    public function setPlancherBasDuDernierNiveau(string $plancher_bas_du_dernier_niveau = null) : void
    {
        $this->plancher_bas_du_dernier_niveau=$plancher_bas_du_dernier_niveau;
    }

    public function getPlancherBasDuDernierNiveauAccessibleAuPublic() : ?string
    {
        return $this->plancher_bas_du_dernier_niveau_accessible_au_public;
    }

    public function setPlancherBasDuDernierNiveauAccessibleAuPublic(string $plancher_bas_du_dernier_niveau_accessible_au_public = null) : void
    {
        $this->plancher_bas_du_dernier_niveau_accessible_au_public=$plancher_bas_du_dernier_niveau_accessible_au_public;
    }

    public function getVoieEngin() : ?bool
    {
        return $this->voie_engin;
    }

    public function setVoieEngin(bool $voie_engin = null) : void
    {
        $this->voie_engin=$voie_engin;
    }

    public function getNombreVoiesEngins() : ?int
    {
        return $this->nombre_voies_engins;
    }

    public function setNombreVoiesEngins(int $nombre_voies_engins = null) : void
    {
        $this->nombre_voies_engins=$nombre_voies_engins;
    }

    public function getVoieEchelle() : ?bool
    {
        return $this->voie_echelle;
    }

    public function setVoieEchelle(bool $voie_echelle = null) : void
    {
        $this->voie_echelle=$voie_echelle;
    }

    public function getNombreFacadesAccessibles() : ?int
    {
        return $this->nombre_facades_accessibles;
    }

    public function setNombreFacadesAccessibles(int $nombre_facades_accessibles = null) : void
    {
        $this->nombre_facades_accessibles=$nombre_facades_accessibles;
    }

    public function getInformationsAccesFacades() : ?string
    {
        return $this->informations_acces_facades;
    }

    public function setInformationsAccesFacades(string $informations_acces_facades = null) : void
    {
        $this->informations_acces_facades=$informations_acces_facades;
    }

    public function getEspaceLibre() : ?bool
    {
        return $this->espace_libre;
    }

    public function setEspaceLibre(bool $espace_libre = null) : void
    {
        $this->espace_libre=$espace_libre;
    }

    public function getDesserteInformationsComplementaires() : ?string
    {
        return $this->desserte_informations_complementaires;
    }

    public function setDesserteInformationsComplementaires(string $desserte_informations_complementaires = null) : void
    {
        $this->desserte_informations_complementaires=$desserte_informations_complementaires;
    }

    public function getPresenceErpOuTiersContigus() : ?bool
    {
        return $this->presence_erp_ou_tiers_contigus;
    }

    public function setPresenceErpOuTiersContigus(bool $presence_erp_ou_tiers_contigus = null) : void
    {
        $this->presence_erp_ou_tiers_contigus=$presence_erp_ou_tiers_contigus;
    }

    public function getIsolementContigusRealiseDegreCf() : ?string
    {
        return $this->isolement_contigus_realise_degre_cf;
    }

    public function setIsolementContigusRealiseDegreCf(string $isolement_contigus_realise_degre_cf = null) : void
    {
        $this->isolement_contigus_realise_degre_cf=$isolement_contigus_realise_degre_cf;
    }

    public function getIsolementContigusRealiseDegreCfAutrePrecision() : ?string
    {
        return $this->isolement_contigus_realise_degre_cf_autre_precision;
    }

    public function setIsolementContigusRealiseDegreCfAutrePrecision(string $isolement_contigus_realise_degre_cf_autre_precision = null) : void
    {
        $this->isolement_contigus_realise_degre_cf_autre_precision=$isolement_contigus_realise_degre_cf_autre_precision;
    }

    public function getIsolementContigusInformationsComplementaires() : ?string
    {
        return $this->isolement_contigus_informations_complementaires;
    }

    public function setIsolementContigusInformationsComplementaires(string $isolement_contigus_informations_complementaires = null) : void
    {
        $this->isolement_contigus_informations_complementaires=$isolement_contigus_informations_complementaires;
    }

    public function getAirLibre() : ?string
    {
        return $this->air_libre;
    }

    public function setAirLibre(string $air_libre = null) : void
    {
        $this->air_libre=$air_libre;
    }

    public function getVisAVis() : ?string
    {
        return $this->vis_a_vis;
    }

    public function setVisAVis(string $vis_a_vis = null) : void
    {
        $this->vis_a_vis=$vis_a_vis;
    }

    public function getIsolementVisAVisInformationsComplementaires() : ?string
    {
        return $this->isolement_vis_a_vis_informations_complementaires;
    }

    public function setIsolementVisAVisInformationsComplementaires(string $isolement_vis_a_vis_informations_complementaires = null) : void
    {
        $this->isolement_vis_a_vis_informations_complementaires=$isolement_vis_a_vis_informations_complementaires;
    }

    public function getPresenceErpOuTiersSuperpose() : ?bool
    {
        return $this->presence_erp_ou_tiers_superpose;
    }

    public function setPresenceErpOuTiersSuperpose(bool $presence_erp_ou_tiers_superpose = null) : void
    {
        $this->presence_erp_ou_tiers_superpose=$presence_erp_ou_tiers_superpose;
    }

    public function getIsolementSuperposeRealiseDegreCf() : ?string
    {
        return $this->isolement_superpose_realise_degre_cf;
    }

    public function setIsolementSuperposeRealiseDegreCf(string $isolement_superpose_realise_degre_cf = null) : void
    {
        $this->isolement_superpose_realise_degre_cf=$isolement_superpose_realise_degre_cf;
    }

    public function getIsolementSuperposeRealiseDegreCfAutrePrecision() : ?string
    {
        return $this->isolement_superpose_realise_degre_cf_autre_precision;
    }

    public function setIsolementSuperposeRealiseDegreCfAutrePrecision(string $isolement_superpose_realise_degre_cf_autre_precision = null) : void
    {
        $this->isolement_superpose_realise_degre_cf_autre_precision=$isolement_superpose_realise_degre_cf_autre_precision;
    }

    public function getIsolementSuperposeInformationsComplementaires() : ?string
    {
        return $this->isolement_superpose_informations_complementaires;
    }

    public function setIsolementSuperposeInformationsComplementaires(string $isolement_superpose_informations_complementaires = null) : void
    {
        $this->isolement_superpose_informations_complementaires=$isolement_superpose_informations_complementaires;
    }

    public function getStructureSf() : ?string
    {
        return $this->structure_sf;
    }

    public function setStructureSf(string $structure_sf = null) : void
    {
        $this->structure_sf=$structure_sf;
    }

    public function getPlancherSf() : ?string
    {
        return $this->plancher_sf;
    }

    public function setPlancherSf(string $plancher_sf = null) : void
    {
        $this->plancher_sf=$plancher_sf;
    }

    public function getStabiliteAuFeuInformationsComplementaires() : ?string
    {
        return $this->stabilite_au_feu_informations_complementaires;
    }

    public function setStabiliteAuFeuInformationsComplementaires(string $stabilite_au_feu_informations_complementaires = null) : void
    {
        $this->stabilite_au_feu_informations_complementaires=$stabilite_au_feu_informations_complementaires;
    }

    public function getIsolementAutreDescription() : ?string
    {
        return $this->isolement_autre_description;
    }

    public function setIsolementAutreDescription(string $isolement_autre_description = null) : void
    {
        $this->isolement_autre_description=$isolement_autre_description;
    }

    public function getConstructionStructuresDescription() : ?string
    {
        return $this->construction_structures_description;
    }

    public function setConstructionStructuresDescription(string $construction_structures_description = null) : void
    {
        $this->construction_structures_description=$construction_structures_description;
    }

    public function getConstructionCouvertureDescription() : ?string
    {
        return $this->construction_couverture_description;
    }

    public function setConstructionCouvertureDescription(string $construction_couverture_description = null) : void
    {
        $this->construction_couverture_description=$construction_couverture_description;
    }

    public function getConstructionFacadesDescription() : ?string
    {
        return $this->construction_facades_description;
    }

    public function setConstructionFacadesDescription(string $construction_facades_description = null) : void
    {
        $this->construction_facades_description=$construction_facades_description;
    }

    public function getTypeCloisonnement() : ?array
    {
        return $this->type_cloisonnement;
    }

    public function setTypeCloisonnement(array $type_cloisonnement = null) : void
    {
        $this->type_cloisonnement=$type_cloisonnement;
    }

    public function getConstructionDistributionInterieureInformationsComplementaires() : ?string
    {
        return $this->construction_distribution_interieure_informations_complementaires;
    }

    public function setConstructionDistributionInterieureInformationsComplementaires(string $construction_distribution_interieure_informations_complementaires = null) : void
    {
        $this->construction_distribution_interieure_informations_complementaires=$construction_distribution_interieure_informations_complementaires;
    }

    public function getLocaux() : ?array
    {
        return $this->locaux;
    }

    public function setLocaux(array $locaux = null) : void
    {
        $this->locaux=$locaux;
    }

    public function getConstructionConduitsEtGainesDescription() : ?string
    {
        return $this->construction_conduits_et_gaines_description;
    }

    public function setConstructionConduitsEtGainesDescription(string $construction_conduits_et_gaines_description = null) : void
    {
        $this->construction_conduits_et_gaines_description=$construction_conduits_et_gaines_description;
    }

    public function getConstructionAmenagementsInterieursDescription() : ?string
    {
        return $this->construction_amenagements_interieurs_description;
    }

    public function setConstructionAmenagementsInterieursDescription(string $construction_amenagements_interieurs_description = null) : void
    {
        $this->construction_amenagements_interieurs_description=$construction_amenagements_interieurs_description;
    }

    public function getDegagementNormaux() : ?array
    {
        return $this->degagement_normaux;
    }

    public function setDegagementNormaux(array $degagement_normaux = null) : void
    {
        $this->degagement_normaux=$degagement_normaux;
    }

    public function getDegagementsAccessoires() : ?array
    {
        return $this->degagements_accessoires;
    }

    public function setDegagementsAccessoires(array $degagements_accessoires = null) : void
    {
        $this->degagements_accessoires=$degagements_accessoires;
    }

    public function getDegagementExigiblesInformationsComplementaires() : ?string
    {
        return $this->degagement_exigibles_informations_complementaires;
    }

    public function setDegagementExigiblesInformationsComplementaires(string $degagement_exigibles_informations_complementaires = null) : void
    {
        $this->degagement_exigibles_informations_complementaires=$degagement_exigibles_informations_complementaires;
    }

    public function getDegagementSupplementaires() : ?array
    {
        return $this->degagement_supplementaires;
    }

    public function setDegagementSupplementaires(array $degagement_supplementaires = null) : void
    {
        $this->degagement_supplementaires=$degagement_supplementaires;
    }

    public function getDegagementEscaliersDescription() : ?string
    {
        return $this->degagement_escaliers_description;
    }

    public function setDegagementEscaliersDescription(string $degagement_escaliers_description = null) : void
    {
        $this->degagement_escaliers_description=$degagement_escaliers_description;
    }

    public function getDegagementAscenseursEscaliersMecaniquesTrottoirsRoulantsDescription() : ?string
    {
        return $this->degagement_ascenseurs_escaliers_mecaniques_trottoirs_roulants_description;
    }

    public function setDegagementAscenseursEscaliersMecaniquesTrottoirsRoulantsDescription(string $degagement_ascenseurs_escaliers_mecaniques_trottoirs_roulants_description = null) : void
    {
        $this->degagement_ascenseurs_escaliers_mecaniques_trottoirs_roulants_description=$degagement_ascenseurs_escaliers_mecaniques_trottoirs_roulants_description;
    }

    public function getPresenceEasOuEquivalents() : ?bool
    {
        return $this->presence_eas_ou_equivalents;
    }

    public function setPresenceEasOuEquivalents(bool $presence_eas_ou_equivalents = null) : void
    {
        $this->presence_eas_ou_equivalents=$presence_eas_ou_equivalents;
    }

    public function getEvacuationPersonnesSituationHandicapObservation() : ?string
    {
        return $this->evacuation_personnes_situation_handicap_observation;
    }

    public function setEvacuationPersonnesSituationHandicapObservation(string $evacuation_personnes_situation_handicap_observation = null) : void
    {
        $this->evacuation_personnes_situation_handicap_observation=$evacuation_personnes_situation_handicap_observation;
    }

    public function getDegagementEspacesAttenteSecurisesInformationsComplementaires() : ?string
    {
        return $this->degagement_espaces_attente_securises_informations_complementaires;
    }

    public function setDegagementEspacesAttenteSecurisesInformationsComplementaires(string $degagement_espaces_attente_securises_informations_complementaires = null) : void
    {
        $this->degagement_espaces_attente_securises_informations_complementaires=$degagement_espaces_attente_securises_informations_complementaires;
    }

    public function getDegagementTribunesEtGradinsNonDemontablesDescription() : ?string
    {
        return $this->degagement_tribunes_et_gradins_non_demontables_description;
    }

    public function setDegagementTribunesEtGradinsNonDemontablesDescription(string $degagement_tribunes_et_gradins_non_demontables_description = null) : void
    {
        $this->degagement_tribunes_et_gradins_non_demontables_description=$degagement_tribunes_et_gradins_non_demontables_description;
    }

    public function getEnfouissement() : ?bool
    {
        return $this->enfouissement;
    }

    public function setEnfouissement(bool $enfouissement = null) : void
    {
        $this->enfouissement=$enfouissement;
    }

    public function getDegagementEnfouissementInformationsComplementaires() : ?string
    {
        return $this->degagement_enfouissement_informations_complementaires;
    }

    public function setDegagementEnfouissementInformationsComplementaires(string $degagement_enfouissement_informations_complementaires = null) : void
    {
        $this->degagement_enfouissement_informations_complementaires=$degagement_enfouissement_informations_complementaires;
    }

    public function getPresenceDesenfumageMcanique() : ?bool
    {
        return $this->presence_desenfumage_mcanique;
    }

    public function setPresenceDesenfumageMcanique(bool $presence_desenfumage_mcanique = null) : void
    {
        $this->presence_desenfumage_mcanique=$presence_desenfumage_mcanique;
    }

    public function getPresenceDesenfumageNaturel() : ?bool
    {
        return $this->presence_desenfumage_naturel;
    }

    public function setPresenceDesenfumageNaturel(bool $presence_desenfumage_naturel = null) : void
    {
        $this->presence_desenfumage_naturel=$presence_desenfumage_naturel;
    }

    public function getVentilationDesenfumageInformationsComplementaires() : ?string
    {
        return $this->ventilation_desenfumage_informations_complementaires;
    }

    public function setVentilationDesenfumageInformationsComplementaires(string $ventilation_desenfumage_informations_complementaires = null) : void
    {
        $this->ventilation_desenfumage_informations_complementaires=$ventilation_desenfumage_informations_complementaires;
    }

    public function getGroupeElectrogene() : ?bool
    {
        return $this->groupe_electrogene;
    }

    public function setGroupeElectrogene(bool $groupe_electrogene = null) : void
    {
        $this->groupe_electrogene=$groupe_electrogene;
    }

    public function getBatteriesAccumulateursEtMaterielsAssocies() : ?bool
    {
        return $this->batteries_accumulateurs_et_materiels_associes;
    }

    public function setBatteriesAccumulateursEtMaterielsAssocies(bool $batteries_accumulateurs_et_materiels_associes = null) : void
    {
        $this->batteries_accumulateurs_et_materiels_associes=$batteries_accumulateurs_et_materiels_associes;
    }

    public function getPhotovoltaique() : ?bool
    {
        return $this->photovoltaique;
    }

    public function setPhotovoltaique(bool $photovoltaique = null) : void
    {
        $this->photovoltaique=$photovoltaique;
    }

    public function getParafoudre() : ?bool
    {
        return $this->parafoudre;
    }

    public function setParafoudre(bool $parafoudre = null) : void
    {
        $this->parafoudre=$parafoudre;
    }

    public function getElectriciteEclairageInformationsComplementaires() : ?string
    {
        return $this->electricite_eclairage_informations_complementaires;
    }

    public function setElectriciteEclairageInformationsComplementaires(string $electricite_eclairage_informations_complementaires = null) : void
    {
        $this->electricite_eclairage_informations_complementaires=$electricite_eclairage_informations_complementaires;
    }

    public function getPuissanceChaufferie() : ?string
    {
        return $this->puissance_chaufferie;
    }

    public function setPuissanceChaufferie(string $puissance_chaufferie = null) : void
    {
        $this->puissance_chaufferie=$puissance_chaufferie;
    }

    public function getPresenceGazChaufferie() : ?bool
    {
        return $this->presence_gaz_chaufferie;
    }

    public function setPresenceGazChaufferie(bool $presence_gaz_chaufferie = null) : void
    {
        $this->presence_gaz_chaufferie=$presence_gaz_chaufferie;
    }

    public function getTypeDeChauffage() : ?array
    {
        return $this->type_de_chauffage;
    }

    public function setTypeDeChauffage(array $type_de_chauffage = null) : void
    {
        $this->type_de_chauffage=$type_de_chauffage;
    }

    public function getChauffageVentilationInformationsComplementaires() : ?string
    {
        return $this->chauffage_ventilation_informations_complementaires;
    }

    public function setChauffageVentilationInformationsComplementaires(string $chauffage_ventilation_informations_complementaires = null) : void
    {
        $this->chauffage_ventilation_informations_complementaires=$chauffage_ventilation_informations_complementaires;
    }

    public function getPuissanceCuisine() : ?string
    {
        return $this->puissance_cuisine;
    }

    public function setPuissanceCuisine(string $puissance_cuisine = null) : void
    {
        $this->puissance_cuisine=$puissance_cuisine;
    }

    public function getTypeDeCuisine() : ?string
    {
        return $this->type_de_cuisine;
    }

    public function setTypeDeCuisine(string $type_de_cuisine = null) : void
    {
        $this->type_de_cuisine=$type_de_cuisine;
    }

    public function getPresenceGazCuisine() : ?bool
    {
        return $this->presence_gaz_cuisine;
    }

    public function setPresenceGazCuisine(bool $presence_gaz_cuisine = null) : void
    {
        $this->presence_gaz_cuisine=$presence_gaz_cuisine;
    }

    public function getSystemeVentilation() : ?string
    {
        return $this->systeme_ventilation;
    }

    public function setSystemeVentilation(string $systeme_ventilation = null) : void
    {
        $this->systeme_ventilation=$systeme_ventilation;
    }

    public function getRisquesSpciauxInformationsComplementaires() : ?string
    {
        return $this->risques_spciaux_informations_complementaires;
    }

    public function setRisquesSpciauxInformationsComplementaires(string $risques_spciaux_informations_complementaires = null) : void
    {
        $this->risques_spciaux_informations_complementaires=$risques_spciaux_informations_complementaires;
    }

    public function getPresenceExtincteur() : ?bool
    {
        return $this->presence_extincteur;
    }

    public function setPresenceExtincteur(bool $presence_extincteur = null) : void
    {
        $this->presence_extincteur=$presence_extincteur;
    }

    public function getPresenceRia() : ?bool
    {
        return $this->presence_ria;
    }

    public function setPresenceRia(bool $presence_ria = null) : void
    {
        $this->presence_ria=$presence_ria;
    }

    public function getDeversoirsPonctuels() : ?bool
    {
        return $this->deversoirs_ponctuels;
    }

    public function setDeversoirsPonctuels(bool $deversoirs_ponctuels = null) : void
    {
        $this->deversoirs_ponctuels=$deversoirs_ponctuels;
    }

    public function getElementsDeConstructionsIrrigues() : ?bool
    {
        return $this->elements_de_constructions_irrigues;
    }

    public function setElementsDeConstructionsIrrigues(bool $elements_de_constructions_irrigues = null) : void
    {
        $this->elements_de_constructions_irrigues=$elements_de_constructions_irrigues;
    }

    public function getPresenceDeci() : ?bool
    {
        return $this->presence_deci;
    }

    public function setPresenceDeci(bool $presence_deci = null) : void
    {
        $this->presence_deci=$presence_deci;
    }

    public function getPresenceColonnesSeches() : ?bool
    {
        return $this->presence_colonnes_seches;
    }

    public function setPresenceColonnesSeches(bool $presence_colonnes_seches = null) : void
    {
        $this->presence_colonnes_seches=$presence_colonnes_seches;
    }

    public function getPresenceColonnesEnCharge() : ?bool
    {
        return $this->presence_colonnes_en_charge;
    }

    public function setPresenceColonnesEnCharge(bool $presence_colonnes_en_charge = null) : void
    {
        $this->presence_colonnes_en_charge=$presence_colonnes_en_charge;
    }

    public function getInstallationExtinction() : ?string
    {
        return $this->installation_extinction;
    }

    public function setInstallationExtinction(string $installation_extinction = null) : void
    {
        $this->installation_extinction=$installation_extinction;
    }

    public function getMoyensDeSecoursInformationsComplementaires() : ?string
    {
        return $this->moyens_de_secours_informations_complementaires;
    }

    public function setMoyensDeSecoursInformationsComplementaires(string $moyens_de_secours_informations_complementaires = null) : void
    {
        $this->moyens_de_secours_informations_complementaires=$moyens_de_secours_informations_complementaires;
    }

    public function getDeciDescription() : ?string
    {
        return $this->deci_description;
    }

    public function setDeciDescription(string $deci_description = null) : void
    {
        $this->deci_description=$deci_description;
    }

    public function getAffichageDesPlansIntervention() : ?bool
    {
        return $this->affichage_des_plans_intervention;
    }

    public function setAffichageDesPlansIntervention(bool $affichage_des_plans_intervention = null) : void
    {
        $this->affichage_des_plans_intervention=$affichage_des_plans_intervention;
    }

    public function getAffichageDesConsignesDeSecurite() : ?bool
    {
        return $this->affichage_des_consignes_de_securite;
    }

    public function setAffichageDesConsignesDeSecurite(bool $affichage_des_consignes_de_securite = null) : void
    {
        $this->affichage_des_consignes_de_securite=$affichage_des_consignes_de_securite;
    }

    public function getTourIncendie() : ?bool
    {
        return $this->tour_incendie;
    }

    public function setTourIncendie(bool $tour_incendie = null) : void
    {
        $this->tour_incendie=$tour_incendie;
    }

    public function getTremieAttaque() : ?bool
    {
        return $this->tremie_attaque;
    }

    public function setTremieAttaque(bool $tremie_attaque = null) : void
    {
        $this->tremie_attaque=$tremie_attaque;
    }

    public function getServiceDeSecuriteIncendie() : ?string
    {
        return $this->service_de_securite_incendie;
    }

    public function setServiceDeSecuriteIncendie(string $service_de_securite_incendie = null) : void
    {
        $this->service_de_securite_incendie=$service_de_securite_incendie;
    }

    public function getPresencePcSecurite() : ?bool
    {
        return $this->presence_pc_securite;
    }

    public function setPresencePcSecurite(bool $presence_pc_securite = null) : void
    {
        $this->presence_pc_securite=$presence_pc_securite;
    }

    public function getServiceDeSecuriteIncendieInformationsComplementaires() : ?string
    {
        return $this->service_de_securite_incendie_informations_complementaires;
    }

    public function setServiceDeSecuriteIncendieInformationsComplementaires(string $service_de_securite_incendie_informations_complementaires = null) : void
    {
        $this->service_de_securite_incendie_informations_complementaires=$service_de_securite_incendie_informations_complementaires;
    }

    public function getSystemeDeSecuriteIncendie() : ?bool
    {
        return $this->systeme_de_securite_incendie;
    }

    public function setSystemeDeSecuriteIncendie(bool $systeme_de_securite_incendie = null) : void
    {
        $this->systeme_de_securite_incendie=$systeme_de_securite_incendie;
    }

    public function getTypeSsi() : ?string
    {
        return $this->type_ssi;
    }

    public function setTypeSsi(string $type_ssi = null) : void
    {
        $this->type_ssi=$type_ssi;
    }

    public function getTypeAlarme() : ?string
    {
        return $this->type_alarme;
    }

    public function setTypeAlarme(string $type_alarme = null) : void
    {
        $this->type_alarme=$type_alarme;
    }

    public function getTemporisationAlarmeEnMinutes() : ?int
    {
        return $this->temporisation_alarme_en_minutes;
    }

    public function setTemporisationAlarmeEnMinutes(int $temporisation_alarme_en_minutes = null) : void
    {
        $this->temporisation_alarme_en_minutes=$temporisation_alarme_en_minutes;
    }

    public function getDesenfumageCommandeParLeSsi() : ?bool
    {
        return $this->desenfumage_commande_par_le_ssi;
    }

    public function setDesenfumageCommandeParLeSsi(bool $desenfumage_commande_par_le_ssi = null) : void
    {
        $this->desenfumage_commande_par_le_ssi=$desenfumage_commande_par_le_ssi;
    }

    public function getLigneTelephoniqueRelieeAuCta() : ?bool
    {
        return $this->ligne_telephonique_reliee_au_cta;
    }

    public function setLigneTelephoniqueRelieeAuCta(bool $ligne_telephonique_reliee_au_cta = null) : void
    {
        $this->ligne_telephonique_reliee_au_cta=$ligne_telephonique_reliee_au_cta;
    }

    public function getAutreSystemeAlerte() : ?string
    {
        return $this->autre_systeme_alerte;
    }

    public function setAutreSystemeAlerte(string $autre_systeme_alerte = null) : void
    {
        $this->autre_systeme_alerte=$autre_systeme_alerte;
    }

    public function getSystemeSecuriteIncendieInformationsComplementaires() : ?string
    {
        return $this->systeme_securite_incendie_informations_complementaires;
    }

    public function setSystemeSecuriteIncendieInformationsComplementaires(string $systeme_securite_incendie_informations_complementaires = null) : void
    {
        $this->systeme_securite_incendie_informations_complementaires=$systeme_securite_incendie_informations_complementaires;
    }

    public function getDefibrillateur() : ?bool
    {
        return $this->defibrillateur;
    }

    public function setDefibrillateur(bool $defibrillateur = null) : void
    {
        $this->defibrillateur=$defibrillateur;
    }

    public function getSpecificitesInformationsComplementaires() : ?string
    {
        return $this->specificites_informations_complementaires;
    }

    public function setSpecificitesInformationsComplementaires(string $specificites_informations_complementaires = null) : void
    {
        $this->specificites_informations_complementaires=$specificites_informations_complementaires;
    }
}
