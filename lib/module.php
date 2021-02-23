<?php

namespace LB4B\LES;

use Bitrix\Main\Loader;

class Module
{
    public const MODULE_ID = 'lb4b.les';
    public const MODULE_VERSION = '0.0.1';
    public const MODULE_VERSION_DATE = '2021-02-21 10:00:00';
    public const MODULE_NAME = 'Laravel Event System';
    public const MODULE_DESCRIPTION = 'Brings Laravel event system beauties to Bitrix';

    public const PARTNER_NAME = 'Laravel Beauties For Bitrix';
    public const PARTNER_URI = 'https://github.com/petrenko-alex';

    public static function getPath(): string
    {
        return Loader::getLocal('modules/' . self::MODULE_ID);
    }
}