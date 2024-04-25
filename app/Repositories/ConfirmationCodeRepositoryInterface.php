<?php

namespace App\Repositories;

use App\Models\UserConfirmationCode;

interface ConfirmationCodeRepositoryInterface
{
    public function create(int $userId, string $code, string $method): UserConfirmationCode;
    public function verifyCode(int $userId, string $code): bool;
}
