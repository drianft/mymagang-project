<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Interview;
use faker\Factory as Faker;

class InterviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Buat 10 data wawancara
        for ($i = 0; $i < 10; $i++) {
            Interview::create([
                'application_id' => $faker->numberBetween(1, 10), // ID aplikasi acak antara 1 dan 10
                'user_id' => $faker->numberBetween(1, 10), // ID user acak antara 1 dan 10
                'date' => $faker->dateTimeBetween('-1 year', 'now'),
                'location' => $faker->address,
            ]);
        }
    }
}
