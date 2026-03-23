<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence(),
            'created_at' => now(),
            'status' => $this->faker->randomElement([
                'REQUESTED',
                'IN_PROGRESS',
                'COMPLETED',
                'CANCELLED'
            ]),
            'patient_id' => Patient::factory(),
            'sector_id' => Sector::factory(),
            'user_id' => $this->faker->boolean(70) ? User::factory() : null,
        ];
    }
}
