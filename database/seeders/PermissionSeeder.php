<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    const PERMISSIONS = [
        'users.add',
        'users.edit',
        'users.view',
        'users.delete',
        'roles.add',
        'roles.edit',
        'roles.view',
        'roles.delete',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::PERMISSIONS as $value) {
            Permission::create([
                'name' => $value,
            ]);
        }
    }
}
