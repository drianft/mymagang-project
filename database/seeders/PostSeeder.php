<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
        Post::create([
            'user_id' => $faker->numberBetween(3, 10), // ID user acak antara 1 dan 10
            'company_id' => $faker->numberBetween(1, 10), // ID company acak antara 1 dan 10
            'job_description' => $faker->sentence(1), // Deskripsi pekerjaan acak
            'working_hour' => $faker->randomElement(['Full Time', 'Part Time']), // Jam kerja acak
            'salary' => $faker->numberBetween(5000000, 20000000), // Gaji acak antara 5 juta dan 20 juta
            'status' => $faker->randomElement(['active', 'inactive']), // Status acak
            'job_category' => $faker->randomElement(['Management', 'Engineering', 'Marketing', 'Sales']), // Kategori pekerjaan acak
        ]);

        // Post::create([
            // 'user_id' => '3',
            // 'company_id' => '2',
            // 'job_description' => 'Admin Only Job',
            // 'working_hour' => 'Full Time',
            // 'salary' => '8000000',
            // 'status' => 'active',
            // 'job_category' => 'Management',
        // ]);

        // Lalu generate 10 data acak

    }
    }
}
