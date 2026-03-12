<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use Faker\Factory as Faker;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {

            Company::create([
                'name' => $faker->unique()->company,
                'email' => $faker->unique()->companyEmail,
                'website' => $faker->url,
                'logo' => null
            ]);

        }
    }
}