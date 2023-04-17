<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => Str::replace(' ', '-', fake()->words(3, true)),
            // 🍰 Tip: Use underscore for magic numbers
            'quantity' => fake()->numberBetween(0, 1_000),
            'unit_price' => fake()->numberBetween(100_000, 5_000_000),
        ];
    }
}
