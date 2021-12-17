<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BuildingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'individual_properties_at_address' => $this->faker->numberBetween(1, 10),
            'building_code' => $this->faker->unique()->numberBetween(10000,99999),
        ];
    }
}
