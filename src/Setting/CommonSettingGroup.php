<?php

namespace Mailery\Common\Setting;

use Mailery\Setting\Model\SettingGroup;
use Mailery\Setting\Model\SettingInterface;

class CommonSettingGroup extends SettingGroup
{
    public const PARAM_NO_REPLY_EMAIL = 'no-reply-email';

    /**
     * @return SettingInterface|null
     */
    public function getNoReplyEmail(): ?SettingInterface
    {
        return $this->get(self::PARAM_NO_REPLY_EMAIL);
    }
}
