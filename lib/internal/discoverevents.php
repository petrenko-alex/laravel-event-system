<?php
namespace LB4B\LES\Internal;

use ReflectionClass;
use ReflectionException;
use ReflectionMethod;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class DiscoverEvents
{
    public static function within(string $listenerPath, string $basePath)
    {
        return static::getListenerEvents(
            (new Finder)->files()->in($listenerPath), $basePath
        );
    }

    protected static function getListenerEvents(Finder $listeners, string $basePath)
    {
        $listenerEvents = [];

        foreach ($listeners as $listener) {
            try {
                $listener = new ReflectionClass(
                    static::classFromFile($listener, $basePath)
                );
            } catch (ReflectionException $e) {
                continue;
            }

            if (! $listener->isInstantiable()) {
                continue;
            }

            // TODO: move on...
        }

        return array_filter($listenerEvents);
    }

    /**
     * Extract the class name from the given file path.
     *
     * @param  \SplFileInfo  $file
     * @param  string  $basePath
     * @return string
     */
    protected static function classFromFile(SplFileInfo $file, $basePath)
    {
        // Remove app base path
        $class = str_replace($basePath, '', $file->getRealPath());

        // Remove modules dir
        $class = str_replace(['/local/modules/', '/bitrix/modules'], '', $class);

        // Remove lib

        // Process path

        // return class name
    }
}