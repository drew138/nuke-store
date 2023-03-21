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
            'price' => fake()->numberBetween(1, 25000),
            'location_country' => fake()->countryCode(),
            'manufacturing_country' => fake()->countryCode(),
            'stock' => fake()->numberBetween(10, 250),
            'image' => $this->faker->bombImage,
            'destruction_power' => fake()->numberBetween(1, 7500),
        ];
    }
}
