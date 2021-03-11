<?php

use Mailery\Common\Setting\CommonSettingGroup;

return [
    CommonSettingGroup::class => [
        '__construct()' => [
            'items' => $params['maileryio/mailery-common']['settings'],
        ],
    ],
];
