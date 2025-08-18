<?php

namespace Metarisc\Model;

/*
 * Objet représentant un local dans un bâtiment.
*/

class ObjetLocal extends ModelAbstract
{
    private ?string $nom_du_local                       = null;
    private ?int $etage_du_local                        = null;
    private ?string $type_de_risque                     = null;
    private ?string $local_informations_complementaires = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var string $data['nom_du_local'] */
        $object->setNomDuLocal($data['nom_du_local']);

        /** @var int $data['etage_du_local'] */
        $object->setEtageDuLocal($data['etage_du_local']);

        /** @var string $data['type_de_risque'] */
        $object->setTypeDeRisque($data['type_de_risque']);

        /** @var string $data['local_informations_complementaires'] */
        $object->setLocalInformationsComplementaires($data['local_informations_complementaires']);

        return $object;
    }

    public function getNomDuLocal() : ?string
    {
        return $this->nom_du_local;
    }

    public function setNomDuLocal(string $nom_du_local = null) : void
    {
        $this->nom_du_local=$nom_du_local;
    }

    public function getEtageDuLocal() : ?int
    {
        return $this->etage_du_local;
    }

    public function setEtageDuLocal(int $etage_du_local = null) : void
    {
        $this->etage_du_local=$etage_du_local;
    }

    public function getTypeDeRisque() : ?string
    {
        return $this->type_de_risque;
    }

    public function setTypeDeRisque(string $type_de_risque = null) : void
    {
        $this->type_de_risque=$type_de_risque;
    }

    public function getLocalInformationsComplementaires() : ?string
    {
        return $this->local_informations_complementaires;
    }

    public function setLocalInformationsComplementaires(string $local_informations_complementaires = null) : void
    {
        $this->local_informations_complementaires=$local_informations_complementaires;
    }
}
