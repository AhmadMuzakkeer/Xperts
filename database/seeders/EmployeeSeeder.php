<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Company;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $companies = Company::all();

        foreach ($companies as $company) {

            $employeeCount = rand(5,12);

            for ($i = 0; $i < $employeeCount; $i++) {

                Employee::create([
                    'first_name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'company_id' => $company->id,
                    'email' => $faker->unique()->safeEmail,
                    'phone' => $faker->numerify('##########')
                ]);

            }

        }
    }
}