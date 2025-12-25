<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'description' => $this->faker->sentence(10), // Random description
            'image' => $this->faker->imageUrl(200, 200, 'people'), // Random image URL
            'address' => $this->faker->address(),
            'mobile' => $this->faker->phoneNumber(),
        ];
    }
}
