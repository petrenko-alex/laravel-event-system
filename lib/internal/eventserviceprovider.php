<?php

namespace LB4B\LES\Internal;

use Bitrix\Main\EventManager;

class EventServiceProvider
{
    protected $listeners = [];

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