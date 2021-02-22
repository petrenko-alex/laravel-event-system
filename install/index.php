<?php

use Bitrix\Main\ModuleManager;

class lb4b_les extends CModule
{
    public $MODULE_ID = "lb4b.les";
    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;
    public $MODULE_NAME;
    public $MODULE_DESCRIPTION;

    public $PARTNER_NAME;
    public $PARTNER_URI;

    public function __construct()
    {
        $arModuleVersion = array();
        include('version.php');

        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        $this->MODULE_NAME = 'Laravel Event System';
        $this->MODULE_DESCRIPTION = 'Brings Laravel event system beauties to Bitrix';

        $this->PARTNER_NAME = 'Laravel Beauties For Bitrix';
        $this->PARTNER_URI = 'https://github.com/petrenko-alex';
    }

    public function DoInstall()
    {
        ModuleManager::registerModule($this->MODULE_ID);

        return true;
    }

    public function DoUninstall()
    {
        ModuleManager::unRegisterModule($this->MODULE_ID);

        return true;
    }
}