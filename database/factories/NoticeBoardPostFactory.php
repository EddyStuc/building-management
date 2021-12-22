<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoticeBoardPostFactory extends Factory
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
            'title' => $this->faker->sentence(),
            'subject' => $this->faker->sentence(),
            'body' => collect($this->faker->paragraphs(6))->map(fn($item) => "<p>{$item}</p>")->implode(''),
        ];
    }
}
