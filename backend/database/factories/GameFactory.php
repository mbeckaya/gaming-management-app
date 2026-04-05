<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'platform_id' => null,
            'genre_id' => null,
            'publisher_id' => null,
            'is_physical' => fake()->boolean(),
            'is_digital' => fake()->boolean(),
            'release' => fake()->numberBetween(1950, now()->year),
        ];
    }
}
