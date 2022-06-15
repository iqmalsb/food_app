<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Table>
 */
class TableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'table_no' => $this->faker->unique()->numberBetween($min = 1, $max = 20),
            'max_pax' => $this->faker->numberBetween($min = 1, $max = 8),
            'status' => $this->faker->word(),
        ];
    }
}
