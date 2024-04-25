<?php

namespace App\Contracts;

interface NotificationInterface
{
    public function send(string $recipient, string $message): void;
}
