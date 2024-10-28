<?php

namespace Database\Seeders;

use App\Models\Trainee;
use Illuminate\Database\Seeder;

class TraineeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trainee::factory(1)->create();
    }
}
