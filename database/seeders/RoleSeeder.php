<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    const ROLES = [
        User::ROLE_ADMIN,
        User::ROLE_CCJPO,
        User::ROLE_ALUMNI,
        User::ROLE_TRAINEE,
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::ROLES as $role) {
            Role::create(['name' => $role]);
        }
    }
}
