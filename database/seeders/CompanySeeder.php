<?php

namespace Database\Seeders;
use App\Models\company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $name = $faker->company;
            $email = $faker->safeEmail;
            $logo = $faker->image(public_path('/storage/logos'), 100, 100, 'business', false);
            $website = $faker->url;

            Company::create([
                'name' => $name,
                'email' => $email,
                'logo' => Storage::url($logo),
                'website' => $website,
            ]);
        }
    }
}
