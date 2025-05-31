<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use Faker\Factory as Faker;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker = Faker::create();

        $services = ['Plumbing', 'Electrical', 'AC Repair', 'Painting', 'Carpentry'];

        foreach ($services as $service) {
            Service::create([
                'name' => $service,
                'description' => $faker->sentence,
            ]);

        }
    }
}
