<?php

namespace Metarisc\Model;

/*
 * Les bâtiments d'une même exploitation et les exploitations groupées dans un même bâtiment ou dans des bâtiments voisins, qui ne répondent pas aux conditions d'isolement du règlement de sécurité, sont considérés comme un seul établissement recevant du public. Néanmoins les dispositions de sécurité incendie doivent être prises pour chaque bâtiment ou exploitation, ainsi l'ensemble des bâtiments ou exploitations groupés doit avoir sa propre fiche ERP. La liaison permet donc de définir les ERP liés entre eux. https://www.legifrance.gouv.fr/loda/article_lc/LEGIARTI000020303850
*/

class ERPLie extends ModelAbstract
{
    private ?\Metarisc\Model\ERP $erp_lie = null;
    private ?string $type                 = null;

    public static function unserialize(array $data) : self
    {
        $object = new self();

        /** @var array<array-key, mixed> $data['erp_lie'] */
        $object->setErpLie($data['erp_lie']);

        /** @var string $data['type'] */
        $object->setType($data['type']);

        return $object;
    }

    public function getErpLie() : ?ERP
    {
        return $this->erp_lie;
    }

    public function setErpLie(array $erp_lie) : void
    {
        $this->erp_lie=ERP::unserialize($erp_lie);
    }

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(string $type = null) : void
    {
        $this->type=$type;
    }
}
