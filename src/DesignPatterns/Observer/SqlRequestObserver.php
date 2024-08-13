<?php

namespace App\DesignPatterns\Observer;

class SqlRequestObserver implements ObserverInterface
{
    public function notify(mixed &$data): void
    {
        $data .= " WHERE foo = 'bar'";
    }
}
