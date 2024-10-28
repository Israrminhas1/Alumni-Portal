<?php

namespace Database\Factories;

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trainee>
 */
class TraineeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();

        return [
            'user_id' => 134,
            'institute_id' => 1,
            'district_id' => $faker->numberBetween(1, 100), // random district ID
            'disable_id' => $faker->optional()->numberBetween(1, 10),
            'registration_no' => $faker->optional()->regexify('[A-Z]{2}[0-9]{6}'), // random reg no
            'father_name' => $faker->name, // generates a random name
            'cnic' => $faker->regexify('[0-9]{5}-[0-9]{7}-[0-9]'), // random CNIC in the format xxxxx-xxxxxxx-x
            'basic_qualification' => $faker->optional()->randomElement(['Matric', 'Intermediate', 'Bachelor', 'Master']),
            'basic_qualification_detail' => $faker->optional()->text(100), // qualification detail with max 100 chars
            'experience' => $faker->optional()->randomElement(['1 Year', '2 Years', '5 Years', 'None']),
            'prv_rec' => $faker->optional()->numberBetween(1, 100), // random previous record ID
            'uid' => $faker->optional()->randomNumber(), // random UID number
            'psdf_traineeId' => $faker->optional()->regexify('[A-Z0-9]{10}'), // random trainee ID
            'psdf_class_code' => $faker->optional()->regexify('[A-Z0-9]{10}'), // random class code
        ];
    }
}
