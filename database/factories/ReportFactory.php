<?php

namespace Database\Factories;

use App\Models\Building;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::where('name', 'like', '%Delta%')->first()->id,
            'building_code' => User::where('name', 'like', '%Delta%')->first()->building_code,
            'slug' => $this->faker->slug(),
            'title' => $this->faker->sentence(),
            'subject' => $this->faker->sentence(),
            'body' => collect($this->faker->paragraphs(6))->map(fn($item) => "<p>{$item}</p>")->implode(''),
        ];
    }
}
