<?php

namespace App\Notification;

use App\Notification\NotificationServiceInterface;

class Notifier implements NotificationServiceInterface
{
    public function __construct(
        /** @var NotificationServiceInterface[] $notifiers */
        protected readonly array $notifiers,
    )
    {
    }

    public function notify(string $message): bool
    {
        // TODO: Implement notify() method.
    }
}
