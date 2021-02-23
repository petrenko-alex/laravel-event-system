<?php

include_once(__DIR__ . '/../lib/module.php');

use LB4B\LES\Module;
use Bitrix\Main\ModuleManager;

class lb4b_les extends CModule
{
    public $MODULE_ID;
    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;
    public $MODULE_NAME;
    public $MODULE_DESCRIPTION;

    public $PARTNER_NAME;
    public $PARTNER_URI;

    public function __construct()
    {
        $this->MODULE_ID = Module::MODULE_ID;
        $this->MODULE_VERSION = Module::MODULE_VERSION;
        $this->MODULE_VERSION_DATE = Module::MODULE_VERSION_DATE;
        $this->MODULE_NAME = Module::MODULE_NAME;
        $this->MODULE_DESCRIPTION = Module::MODULE_DESCRIPTION;

        $this->PARTNER_NAME = Module::PARTNER_NAME;
        $this->PARTNER_URI = Module::PARTNER_URI;
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