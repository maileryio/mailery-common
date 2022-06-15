<?php

use Mailery\Common\Setting\GeneralSettingGroup;

return [
    GeneralSettingGroup::class => [
        '__construct()' => [
            'items' => $params['maileryio/mailery-setting']['groups']['general']['items'],
            'order' => $params['maileryio/mailery-setting']['groups']['general']['order'] ?? 0,
        ],
    ],
];
