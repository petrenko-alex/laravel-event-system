<?php B_PROLOG_INCLUDED === true || die();

require(__DIR__ . '/vendor/autoload.php');

use LB4B\LES\EventServiceProvider;

(new EventServiceProvider())
    ->register();