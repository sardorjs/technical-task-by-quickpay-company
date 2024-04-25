<?php

namespace App\Repositories;

use App\Models\UserSetting;

interface SettingsRepositoryInterface
{
    public function findByUserId(int $userId): UserSetting;
    public function update(UserSetting $setting): UserSetting;
}
