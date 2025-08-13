<?php

namespace Metarisc\Model;

/*
 * Recensement du nombre de personnes présentes dans un niveau à un instant donné.
*/

class EffectifsNiveau extends ModelAbstract
{
    private ?int $niveau                       = null;
    private ?string $local                     = null;
    private ?string $activite_principale       = null;
    private ?int $surface_totale               = null;
    private ?int $surface_accessible_au_public = null;
    private ?int $effectif_public              = null;
    private ?int $effectif_personnel           = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var int $data['niveau'] */
        $object->setNiveau($data['niveau']);

        /** @var string $data['local'] */
        $object->setLocal($data['local']);

        /** @var string $data['activite_principale'] */
        $object->setActivitePrincipale($data['activite_principale']);

        /** @var int $data['surface_totale'] */
        $object->setSurfaceTotale($data['surface_totale']);

        /** @var int $data['surface_accessible_au_public'] */
        $object->setSurfaceAccessibleAuPublic($data['surface_accessible_au_public']);

        /** @var int $data['effectif_public'] */
        $object->setEffectifPublic($data['effectif_public']);

        /** @var int $data['effectif_personnel'] */
        $object->setEffectifPersonnel($data['effectif_personnel']);

        return $object;
    }

    public function getNiveau() : ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau = null) : void
    {
        $this->niveau=$niveau;
    }

    public function getLocal() : ?string
    {
        return $this->local;
    }

    public function setLocal(string $local = null) : void
    {
        $this->local=$local;
    }

    public function getActivitePrincipale() : ?string
    {
        return $this->activite_principale;
    }

    public function setActivitePrincipale(string $activite_principale = null) : void
    {
        $this->activite_principale=$activite_principale;
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
}
