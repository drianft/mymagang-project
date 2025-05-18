<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('companies')->insert([
                'name' => $faker->company,
                'email' => $faker->unique()->companyEmail,
                'role' => 'Employer',
                'joining_date' => $faker->dateTimeBetween('-100 days', 'now'),
                'status' => $faker->randomElement(['Active', 'Inactive']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
