<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\employee;
use App\Models\company;
class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $companies = company::all();

        foreach ($companies as $company) {
            for ($i = 0; $i < 30; $i++) {
                $firstName = $faker->firstName;
                $lastName = $faker->lastName;
                $email = $faker->safeEmail;
                $phone = $faker->phoneNumber;

                $company->employees()->create([
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'email' => $email,
                    'phone' => $phone,
                ]);
            }
        }
    }
}
