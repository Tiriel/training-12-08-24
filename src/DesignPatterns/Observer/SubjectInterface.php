<?php

namespace App\DesignPatterns\Observer;

interface SubjectInterface
{
    public function registerObserver(string $event, ObserverInterface $observer);

    public function unregisterObserver(string $event, ObserverInterface $observer);

    public function notifyObservers(string $event, mixed &$data);
}
