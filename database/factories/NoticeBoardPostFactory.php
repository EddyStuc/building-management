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
            'user_id' => User::where('name', 'like', '%Tromp%')->first()->id,
            'building_code' => User::where('name', 'like', '%Tromp%')->first()->building_code,
            'slug' => $this->faker->slug(),
            'title' => $this->faker->sentence(),
            'subject' => $this->faker->sentence(),
            'body' => collect($this->faker->paragraphs(6))->map(fn($item) => "<p>{$item}</p>")->implode(''),
        ];
    }
}
