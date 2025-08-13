<?php

namespace Metarisc\Model;

/*
 * Gestion des préférences pour une organisation.
*/

class OrganisationPreferences extends ModelAbstract
{
    private ?string $platau_id_acteur             = null;
    private ?bool $platau_active                  = null;
    private ?string $s3_global_endpoint           = null;
    private ?string $rapport_modele_rapport_etude = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['platau_id_acteur'] */
        $object->setPlatauIdActeur($data['platau_id_acteur']);

        /** @var bool $data['platau_active'] */
        $object->setPlatauActive($data['platau_active']);

        /** @var string $data['s3_global_endpoint'] */
        $object->setS3GlobalEndpoint($data['s3_global_endpoint']);

        /** @var string $data['rapport_modele_rapport_etude'] */
        $object->setRapportModeleRapportEtude($data['rapport_modele_rapport_etude']);

        return $object;
    }

    public function getPlatauIdActeur() : ?string
    {
        return $this->platau_id_acteur;
    }

    public function setPlatauIdActeur(string $platau_id_acteur = null) : void
    {
        $this->platau_id_acteur=$platau_id_acteur;
    }

    public function getPlatauActive() : ?bool
    {
        return $this->platau_active;
    }

    public function setPlatauActive(bool $platau_active = null) : void
    {
        $this->platau_active=$platau_active;
    }

    public function getS3GlobalEndpoint() : ?string
    {
        return $this->s3_global_endpoint;
    }

    public function setS3GlobalEndpoint(string $s3_global_endpoint = null) : void
    {
        $this->s3_global_endpoint=$s3_global_endpoint;
    }

    public function getRapportModeleRapportEtude() : ?string
    {
        return $this->rapport_modele_rapport_etude;
    }

    public function setRapportModeleRapportEtude(string $rapport_modele_rapport_etude = null) : void
    {
        $this->rapport_modele_rapport_etude=$rapport_modele_rapport_etude;
    }
}
