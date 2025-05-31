<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AssignRolesFromUserTableSeeder extends Seeder
{
    public function run()
    {
        $roles = ['admin', 'client', 'technician'];

        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        $users = User::all();

        foreach ($users as $user) {
            if (in_array($user->role, $roles)) {
                $user->syncRoles([$user->role]);
                $this->command->info("Assigned role '{$user->role}' to {$user->email}");
            } else {
                $this->command->warn("No matching role for {$user->email}");
            }
        }
    }
}
