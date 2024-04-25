<?php

namespace App\Services\Notifications;

use App\Contracts\NotificationInterface;

class TelegramNotification implements NotificationInterface
{

    /**
     * @param string $recipient
     * @param string $message
     * @return void
     */
    public function send(string $recipient, string $message): void
    {
        // Логика отправки сообщений в Telegram
        // Реализацию бы взял из этой доки - Telegram Bot API - https://core.telegram.org/bots/api#making-requests
    }
}
