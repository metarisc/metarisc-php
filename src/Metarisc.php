<?php

namespace Metarisc;

use Metarisc\Services\POIAPI;
use Metarisc\Services\WFSAPI;
use Metarisc\Services\PingAPI;
use Metarisc\Services\DossiersAPI;
use Metarisc\Services\OrganisationAPI;
use Metarisc\Services\UtilisateursAPI;
use Metarisc\Services\NotificationsAPI;
use Metarisc\Services\ResumableFileUploadsAPI;

class Metarisc extends MetariscAbstract
{
    public static array $class_map =  [
        'DossiersAPI'            => DossiersAPI::class,
        'NotificationsAPI'       => NotificationsAPI::class,
        'OrganisationAPI'        => OrganisationAPI::class,
        'POIAPI'                 => POIAPI::class,
        'PingAPI'                => PingAPI::class,
        'ResumableFileUploadsAPI'=> ResumableFileUploadsAPI::class,
        'UtilisateursAPI'        => UtilisateursAPI::class,
        'WFSAPI'                 => WFSAPI::class,
    ];

    public function __get(string $name)
    {
        /** @var class-string<MetariscAbstract>|null $class_name */
        $class_name = \array_key_exists($name, self::$class_map) ? self::$class_map[$name] : null;

        \assert(null !== $class_name, "Service $name inconnu");

        return new $class_name($this->getConfig());
    }
}
