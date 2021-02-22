<?php

namespace LB4B\LES;

use LB4B\LES\Listeners;
use Bitrix\Main\EventManager;

class EventServiceProvider
{
    protected $listeners = [
        'main' => [
            'OnEndBufferContent' => [
                Listeners\StubListener::class,
            ],
        ],
    ];

    public function getListeners(): array
    {
        return $this->listeners;
    }

    public function register(): void
    {
        $eventManager = EventManager::getInstance();

        foreach ($this->getListeners() as $moduleName => $moduleEvents) {
            foreach ($moduleEvents as $eventName => $eventListeners) {
                foreach (array_unique($eventListeners) as $listener) {
                    $eventManager->addEventHandler(
                        $moduleName,
                        $eventName,
                        [$listener, 'handle']
                    );
                }
            }
        }
    }
}