<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserConfirmationCode;
use App\Models\UserSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)
            ->has(UserSetting::factory()->count(5))
            ->has(UserConfirmationCode::factory()->count(3))
            ->create();
    }
}
