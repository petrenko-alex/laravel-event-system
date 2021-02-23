<?php

namespace LB4B\LES;

use LB4B\LES\Listeners;
use LB4B\LES\Internal\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listeners = [
        'main' => [
            'OnEndBufferContent' => [
                Listeners\StubListener::class,
            ],
        ],
    ];
}