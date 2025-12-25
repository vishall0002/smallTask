<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(), // Random single-word name
            'time' => $this->faker->numberBetween(10, 120) . ' mins', // Random time in minutes
            'release_date' => $this->faker->date(), // Random release date
        ];
    }
}
