<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ProvinceSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TraineeSeeder::class);
        $this->call(SyncRolesAndPermissionsSeeder::class);
        $this->call(ResumeTemplateSeeder::class);
    }
}
