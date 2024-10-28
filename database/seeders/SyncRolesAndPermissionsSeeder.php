<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SyncRolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('model_has_roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        Permission::truncate();
        Role::truncate();

        Schema::enableForeignKeyConstraints();

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);

        $admin = Role::where('name', User::ROLE_ADMIN)->first();
        $admin->givePermissionTo(Permission::all());

        $ccjpo = Role::where('name', User::ROLE_CCJPO)->first();
        $ccjpo->givePermissionTo(Permission::where('name', 'LIKE', '%users.%')->get());

        User::whereEmail('admin@alumni.com')->first()?->assignRole(User::ROLE_ADMIN);
        User::whereEmail('trainee@alumni.com')->first()?->assignRole(User::ROLE_TRAINEE);
    }
}
