<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@alumni.com',
                'password' => Hash::make('Admin456$'),
            ],
            [
                'name' => 'Trainee',
                'email' => 'trainee@alumni.com',
                'password' => Hash::make('Trainee456$'),
            ],
        ];
        foreach ($users as $user) {
            $user = User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'email_verified_at' => now(),
                    'password' => $user['password'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
