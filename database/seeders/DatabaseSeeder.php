<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\ContactMessage;
use App\Models\NoticeboardPost;
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
                    'building_id' => $user->building_id
                ]);
            NoticeboardPost::factory()
                ->create([
                   'user_id' => $user->id ,
                   'building_id' => $user->building_id
                ]);
            ContactMessage::factory()
                ->create([
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'building_id' => $user->building_id
                ]);
        }

    }
}
