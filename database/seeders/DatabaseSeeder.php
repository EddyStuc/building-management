<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Building::factory(10)->create();

        $users = User::factory(10)->create();

        foreach ($users as $user) {
            Report::factory()
                ->create([
                    'user_id' => $user->id,
                    'building_code' => $user->building_code,
                ]);
        }

    }
}
