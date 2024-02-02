<?php

namespace Metarisc;

use Metarisc\Service\PEIAPI;
use Metarisc\Service\PingAPI;
use Metarisc\Service\DossiersAPI;
use Metarisc\Service\EvenementsAPI;
use Metarisc\Service\UtilisateursAPI;
use Metarisc\Service\NotificationsAPI;
use Metarisc\Service\OrganisationsAPI;

class Metarisc extends MetariscAbstract
{
    public static array $class_map =  [
        'utilisateurs'  => UtilisateursAPI::class,
        'dossiers'      => DossiersAPI::class,
        'organisations' => OrganisationsAPI::class,
        'pei'           => PEIAPI::class,
        'ping'          => PingAPI::class,
        'evenements'    => EvenementsAPI::class,
        'notifications' => NotificationsAPI::class,
    ];

    public function __get(string $name)
    {
        /** @var class-string<MetariscAbstract>|null $class_name */
        $class_name = \array_key_exists($name, self::$class_map) ? self::$class_map[$name] : null;

        \assert(null !== $class_name, "Service $name inconnu");

        return new $class_name($this->getConfig(), $this->getClient());
    }
}
