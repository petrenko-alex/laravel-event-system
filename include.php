<?php B_PROLOG_INCLUDED === true || die();

use LB4B\LES\EventServiceProvider;

(new EventServiceProvider())
    ->register();