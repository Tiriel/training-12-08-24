<?php

namespace App\DesignPatterns\Observer;

class PdoExceptionFormatterObserver implements ObserverInterface
{
    public function notify(mixed &$data): void
    {
        if (!$data instanceof \PDOException) {
            return;
        }

        echo $data->getMessage();
    }
}
