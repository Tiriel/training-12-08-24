<?php

namespace App\DesignPatterns\Observer;

use App\DesignPatterns\Observer\SubjectInterface;

class EventDispatcher implements SubjectInterface
{
    protected array $observers = [];

    public function registerObserver(string $event, ObserverInterface $observer)
    {
        $this->observers[$event][] = $observer;
    }

    public function unregisterObserver(string $event, ObserverInterface $observer)
    {
        $pos = \array_search($observer, $this->observers[$event]);

        if (false !== $pos) {
            unset($this->observers[$event]);
        }
    }

    public function notifyObservers(string $event, mixed &$data)
    {
        foreach ($this->observers[$event] as $observer) {
            /** @var ObserverInterface $observer */
            $observer->notify($data);
        }
    }
}
