<?php

namespace App\Repositories;

use App\Models\UserSetting;

class SettingsLocalRepository implements SettingsRepositoryInterface
{
    /**
     * Найти настройки пользователя по ID пользователя.
     *
     * @param  int $userId
     * @return UserSetting
     */
    public function findByUserId(int $userId): UserSetting
    {
        return UserSetting::where('user_id', $userId)->firstOrFail();
    }

    /**
     * Обновить настройку пользователя.
     *
     * @param  UserSetting $setting
     * @return UserSetting
     */
    public function update(UserSetting $setting): UserSetting
    {
        $setting->save();
        return $setting;
    }
}
