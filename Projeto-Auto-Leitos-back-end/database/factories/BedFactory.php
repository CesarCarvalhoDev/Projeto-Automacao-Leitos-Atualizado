<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bed>
 */
class BedFactory extends Factory
{
    public function available(): static
    {
        return $this->state(fn() => [
            'status' => 'AVAILABLE',
        ]);
    }

    public function occupied(): static
    {
        return $this->state(fn() => [
            'status' => 'OCCUPIED',
        ]);
    }

    public function maintenance(): static
    {
        return $this->state(fn() => [
            'status' => 'MAINTENANCE',
        ]);
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => $this->faker->unique()->numberBetween(1, 100),
            'status' => 'AVAILABLE',
        ];
    }
}
