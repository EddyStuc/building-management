<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->slug(),
            'subject' => $this->faker->sentence(),
            'message' => $this->faker->paragraphs(5, true),
            'phone' => $this->faker->phoneNumber(),
            'answered' => false
        ];
    }
}
