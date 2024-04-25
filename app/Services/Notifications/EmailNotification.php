<?php

namespace App\Services\Notifications;

use App\Contracts\NotificationInterface;

class EmailNotification implements NotificationInterface
{

    /**
     * @param string $recipient
     * @param string $message
     * @return void
     */
    public function send(string $recipient, string $message): void
    {
        // Логика отправки email
        // Реализацию бы взял из этой доки - https://laravel.com/docs/11.x/notifications#slack-notifications
    }
}
