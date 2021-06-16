<?php

/*
 * @copyright   2018 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

return [
    'name'        => 'WhatsApp',
    'description' => 'WhatsApp Sms integration',
    'author'      => 'salman.com',
    'version'     => '1.0.0',
    'services' => [
        'events'  => [],
        'forms'   => [
        ],
        'helpers' => [],
        'other'   => [
            'mautic.sms.transport.whatsapp' => [
                'class'     => \MauticPlugin\MauticWhatsAppBundle\Services\WhatsAppApi::class,
                'arguments' => [
                    'mautic.page.model.trackable',
                    'mautic.helper.phone_number',
                    'mautic.helper.integration',
                    'monolog.logger.mautic',
                    'mautic.http.connector'
                ],
                'alias' => 'mautic.sms.config.transport.whatsapp',
                'tag'          => 'mautic.sms_transport',
                'tagArguments' => [
                    'integrationAlias' => 'WhatsApp',
                ],
            ],
        ],
        'models'       => [],
        'integrations' => [
            'mautic.integration.whatsapp' => [
                'class' => \MauticPlugin\MauticWhatsAppBundle\Integration\WhatsAppIntegration::class,
                'arguments' => [
                    'event_dispatcher',
                    'mautic.helper.cache_storage',
                    'doctrine.orm.entity_manager',
                    'session',
                    'request_stack',
                    'router',
                    'translator',
                    'logger',
                    'mautic.helper.encryption',
                    'mautic.lead.model.lead',
                    'mautic.lead.model.company',
                    'mautic.helper.paths',
                    'mautic.core.model.notification',
                    'mautic.lead.model.field',
                    'mautic.plugin.model.integration_entity',
                    'mautic.lead.model.dnc',
                ],
            ],
        ],
    ],
    'routes'     => [],
    'menu'       => [],
    'parameters' => [
    ],
];
