<?php

namespace App\Repositories;

use App\Models\UserConfirmationCode;

class ConfirmationCodeLocalRepository implements ConfirmationCodeRepositoryInterface
{
    /**
     * Создать запись кода подтверждения.
     *
     * @param  int    $userId
     * @param  string $code
     * @param  string $method
     * @return UserConfirmationCode
     */
    public function create(int $userId, string $code, string $method): UserConfirmationCode
    {
        $confirmationCode = new UserConfirmationCode([
            'user_id' => $userId,
            'code' => $code,
            'method' => $method,
            'expires_at' => now()->addMinutes(10) // Код действителен 10 минут
        ]);
        $confirmationCode->save();
        return $confirmationCode;
    }

    /**
     * Проверить код подтверждения.
     *
     * @param  int    $userId
     * @param  string $code
     * @return bool
     */
    public function verifyCode(int $userId, string $code): bool
    {
        $confirmationCode = UserConfirmationCode::where('user_id', $userId)
            ->where('code', $code)
            ->where('expires_at', '>', now())
            ->first();

        if ($confirmationCode && !$confirmationCode->confirmed) {
            $confirmationCode->confirmed = true;
            $confirmationCode->save();
            return true;
        }

        return false;
    }
}
