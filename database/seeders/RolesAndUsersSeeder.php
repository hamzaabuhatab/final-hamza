<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RolesAndUsersSeeder extends Seeder
{
    public function run()
    {
        $roles = ['admin', 'technical', 'client'];
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        $emailToAssign = 'admin@example.com';
        $user = User::where('email', 'admin@example.com')->first();

        if ($user) {
            $user->assignRole('Admin');
            $this->command->info("Role 'admin' assigned to user with email: $emailToAssign");
        } else {
            $this->command->error("User with email $emailToAssign not found.");
        }
    }
}
