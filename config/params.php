<?php

use Mailery\Common\Setting\GeneralSettingGroup;
use Mailery\Setting\Form\SettingForm;
use Yiisoft\Definitions\Reference;
use Yiisoft\Form\Widget\Field;
use Yiisoft\Validator\Rule\Required;
use Yiisoft\Validator\Rule\HasLength;
use Yiisoft\Validator\Rule\Email;

return [
    'maileryio/mailery-setting' => [
        'groups' => [
            'general' => [
                'reference' => Reference::to(GeneralSettingGroup::class),
                'items' => [
                    GeneralSettingGroup::PARAM_NO_REPLY_EMAIL => [
                        'name' => GeneralSettingGroup::PARAM_NO_REPLY_EMAIL,
                        'label' => static function () {
                            return 'System no-reply email address';
                        },
                        'description' => static function () {
                            return 'This email address is used as the system sender without the need to reply';
                        },
                        'field' => static function (Field $field, SettingForm $form) {
                            return $field->email($form, GeneralSettingGroup::PARAM_NO_REPLY_EMAIL);
                        },
                        'rules' => static function () {
                            return [
                                Required::rule(),
                                Email::rule(),
                                HasLength::rule()->max(255),
                            ];
                        },
                        'value' => 'no-reply@mailery.io',
                    ],
                ]
            ],
        ],
    ],
];
