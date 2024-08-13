<?php

namespace App\DesignPatterns\Observer;

interface ObserverInterface
{
    public function notify(mixed &$data);
}
