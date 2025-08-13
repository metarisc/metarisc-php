<?php

namespace Metarisc;

use Metarisc\Service\ERPAPI;
use Metarisc\Service\MoiAPI;
use Metarisc\Service\PEIAPI;
use Metarisc\Service\FeedAPI;
use Metarisc\Service\PingAPI;
use Metarisc\Service\ContactsAPI;
use Metarisc\Service\DossiersAPI;
use Metarisc\Service\AnomaliesAPI;
use Metarisc\Service\DocumentsAPI;
use Metarisc\Service\WorkflowsAPI;
use Metarisc\Service\EnveloppesAPI;
use Metarisc\Service\EvenementsAPI;
use Metarisc\Service\CommissionsAPI;
use Metarisc\Service\HealthcheckAPI;
use Metarisc\Service\PermissionsAPI;
use Metarisc\Service\TournesDECIAPI;
use Metarisc\Service\ControlesPEIAPI;
use Metarisc\Service\OrdresDuJourAPI;
use Metarisc\Service\UtilisateursAPI;
use Metarisc\Service\NotificationsAPI;
use Metarisc\Service\OrganisationsAPI;
use Metarisc\Service\PrescriptionsAPI;
use Metarisc\Service\MainsCourantesAPI;
use Metarisc\Service\CommissionsMembresAPI;
use Metarisc\Service\SitesGeographiquesAPI;
use Metarisc\Service\DossiersAffectationsAPI;
use Metarisc\Service\DatesPassageCommissionAPI;
use Metarisc\Service\MainsCourantesParticipantsAPI;

class Metarisc extends MetariscAbstract
{
    public static array $class_map =  [
        'dates_passage_commission'     => DatesPassageCommissionAPI::class,
        'dossiers'                     => DossiersAPI::class,
        'documents'                    => DocumentsAPI::class,
        'moi'                          => MoiAPI::class,
        'ping'                         => PingAPI::class,
        'sites_geographiques'          => SitesGeographiquesAPI::class,
        'workflows'                    => WorkflowsAPI::class,
        'healthcheck'                  => HealthcheckAPI::class,
        'enveloppes'                   => EnveloppesAPI::class,
        'organisations'                => OrganisationsAPI::class,
        'pei'                          => PEIAPI::class,
        'commissions'                  => CommissionsAPI::class,
        'permissions'                  => PermissionsAPI::class,
        'mains_courantes_participants' => MainsCourantesParticipantsAPI::class,
        'prescriptions'                => PrescriptionsAPI::class,
        'utilisateurs'                 => UtilisateursAPI::class,
        'erp'                          => ERPAPI::class,
        'dossiers_affectations'        => DossiersAffectationsAPI::class,
        'mains_courantes'              => MainsCourantesAPI::class,
        'anomalies'                    => AnomaliesAPI::class,
        'supports_reglementaires'      => PrescriptionsAPI::class,
        'feed'                         => FeedAPI::class,
        'tournees_deci'                => TournesDECIAPI::class,
        'controles_pei'                => ControlesPEIAPI::class,
        'evenements'                   => EvenementsAPI::class,
        'ordres_du_jour'               => OrdresDuJourAPI::class,
        'commissions_membres'          => CommissionsMembresAPI::class,
        'contacts'                     => ContactsAPI::class,
        'notifications'                => NotificationsAPI::class,
    ];

    public function __get(string $name)
    {
        /** @var class-string<MetariscAbstract>|null $class_name */
        $class_name = \array_key_exists($name, self::$class_map) ? self::$class_map[$name] : null;

        \assert(null !== $class_name, "Service $name inconnu");

        return new $class_name($this->getConfig(), $this->getClient());
    }
}
