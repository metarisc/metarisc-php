<?php

namespace Metarisc;

use Metarisc\Service\POIAPI;
use Metarisc\Service\PingAPI;
use Metarisc\Service\SupportAPI;
use Metarisc\Service\DossiersAPI;
use Metarisc\Service\OrganisationAPI;
use Metarisc\Service\UtilisateursAPI;
use Metarisc\Service\NotificationsAPI;

class Metarisc extends MetariscAbstract
{
    public static array $class_map =  [
        'dossiers'             => DossiersAPI::class,
        'notifications'        => NotificationsAPI::class,
        'organisations'        => OrganisationAPI::class,
        'poi'                  => POIAPI::class,
        'ping'                 => PingAPI::class,
        'support'              => SupportAPI::class,
        'utilisateurs'         => UtilisateursAPI::class,
    ];

    public function __get(string $name)
    {
        /** @var class-string<MetariscAbstract>|null $class_name */
        $class_name = \array_key_exists($name, self::$class_map) ? self::$class_map[$name] : null;

        \assert(null !== $class_name, "Service $name inconnu");

        return new $class_name($this->getConfig(), $this->getClient());
    }
}
