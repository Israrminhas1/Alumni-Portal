<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            ['name' => 'Punjab', 'abbreviation' => 'PB'],
            ['name' => 'Sindh', 'abbreviation' => 'SD'],
            ['name' => 'Khyber Pakhtunkhwa', 'abbreviation' => 'KP'],
            ['name' => 'Balochistan', 'abbreviation' => 'BL'],
            ['name' => 'Islamabad Capital Territory', 'abbreviation' => 'ICT'],
            ['name' => 'Gilgit-Baltistan', 'abbreviation' => 'GB'],
            ['name' => 'Azad Jammu & Kashmir', 'abbreviation' => 'AJK'],
        ];

        foreach ($provinces as $province) {
            Province::create($province);
        }
    }
}
