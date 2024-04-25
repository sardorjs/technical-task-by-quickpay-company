<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserConfirmationCode>
 */
class UserConfirmationCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
//            'user_id' => User::factory(),
            'code' => fake()->randomNumber(6),
            'method' => fake()->randomElement(['email', 'phone', 'telegram']),
            'expires_at' => now()->addHours(1),
            'confirmed' => false,
        ];
    }
}
