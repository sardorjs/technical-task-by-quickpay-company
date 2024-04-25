<?php

namespace App\Services\Notifications;

use App\Contracts\NotificationInterface;

class SmsNotification implements NotificationInterface
{

    /**
     * @param string $recipient
     * @param string $message
     * @return void
     */
    public function send(string $recipient, string $message): void
    {
        // Логика отправки SMS
        // Реализацию бы взял из этой доки - https://getsms.uz/page/index/16
    }
}
