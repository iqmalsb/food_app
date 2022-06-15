<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'image' => $this->faker->imageURL(640,480),
            'price' => $this->faker->numberBetween($min = 0, $max = 30),
            'category_id' => $this->faker->numberBetween($min = 1, $max = 5),
        ];
    }
}
