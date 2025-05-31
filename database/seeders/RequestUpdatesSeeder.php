<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\RequestUpdate;
use App\Models\User;
use App\Models\MaintenanceRequest;
use Faker\Factory as Faker;

class RequestUpdatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $requests = MaintenanceRequest::all();
        $users = User::all();

        foreach ($requests as $request) {
            RequestUpdate::create([
                'maintenance_request_id' => $request->id,
                'status' => $faker->randomElement(['new', 'in_progress', 'completed']),
                'note' => $faker->sentence,
                'updated_by' => $users->random()->id,
                'updated_at' => $faker->dateTimeThisMonth(),
            ]);
        }
    }
}
