<?php

namespace App\Notification;

interface NotificationServiceInterface
{
    public function notify(string $message): bool;
}
