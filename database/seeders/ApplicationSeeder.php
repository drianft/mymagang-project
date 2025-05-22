<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Application;
use Faker\Factory as Faker;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Buat 10 data aplikasi
        for ($i = 0; $i < 10; $i++) {
            Application::create([
                'user_id' => $faker->numberBetween(3, 10), // ID user acak antara 1 dan 10
                'post_id' => $faker->numberBetween(1, 14), // ID post acak antara 1 dan 10
                'status' => $faker->randomElement(['pending', 'accepted', 'rejected']), // Status acak
                'application_date' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }

    }
}
