<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'rating' => fake()->numberBetween(1, 5),
            'image' => $this->faker->reviewImage,
            'description' => $this->faker->reviews,
            'is_verified' => fake()->boolean(),
        ];
    }
}
