<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bomb>
 */
class BombFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->bombName,
            'type' => $this->faker->bombType,
            'price' => fake()->numberBetween(1, 1000),
            'location_country' => fake()->country(),
            'manufacturing_country' => fake()->country(),
            'stock' => fake()->numberBetween(1, 10),
            'image' => $this->faker->bombImage,
            'destruction_power' => fake()->numberBetween(1, 1000),
        ];
    }
}
