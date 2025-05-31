<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
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

        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'phone' => $faker->phoneNumber,
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        // Technicians and Clients
        for ($i = 0; $i < 5; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'role' => 'technician',
                'password' => Hash::make('password'),
            ]);

            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'role' => 'client',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
