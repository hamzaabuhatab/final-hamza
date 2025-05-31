<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\MaintenanceRequest;
use App\Models\User;
use App\Models\Service;
use Faker\Factory as Faker;

class MaintenanceRequestssSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $clients = User::where('role', 'client')->get();
        $technicians = User::where('role', 'technician')->get();
        $services = Service::all();

        for ($i = 0; $i < 10; $i++) {
            MaintenanceRequest::create([
                'client_id' => $clients->random()->id,
                'technician_id' => $technicians->random()->id,
                'service_id' => $services->random()->id,
                'description' => $faker->paragraph,
                'status' => $faker->randomElement(['new', 'in_progress', 'completed']),
                'requested_at' => $faker->dateTimeThisYear(),
                'completed_at' => $faker->optional()->dateTimeThisMonth(),
            ]);
        }
    }
}
