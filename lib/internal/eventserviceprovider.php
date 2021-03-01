<?php

namespace LB4B\LES\Internal;

use LB4B\LES\Module;
use Bitrix\Main\Application;
use Bitrix\Main\EventManager;

class EventServiceProvider
{
    protected $listeners = [];

    public function getListeners(): array
    {
        return $this->listeners;
    }

    /**
     * Register the application's event listeners.
     *
     * @return void
     */
    public function register(): void
    {
        $eventManager = EventManager::getInstance();

        $this->discoverEvents();

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

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }

    /**
     * Discover the events and listeners for the application.
     *
     * @return array
     */
    public function discoverEvents()
    {
        foreach ($this->discoverEventsWithin() as $directory) {
            if (!is_dir($directory)) {
                continue;
            }

            DiscoverEvents::within($directory, Application::getDocumentRoot());
        }
    }

    protected function discoverEventsWithin(): array
    {
        return [
            Module::getPath() . '/lib/listeners/',
        ];
    }
}