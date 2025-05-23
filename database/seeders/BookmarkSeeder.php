<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bookmark;
use faker\Factory as Faker;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Buat 10 data bookmark
        for ($i = 0; $i < 10; $i++) {
            Bookmark::create([
                'user_id' => $faker->numberBetween(1, 10), // ID user acak antara 1 dan 10
                'post_id' => $faker->numberBetween(1, 10), // ID post acak antara 1 dan 10
                'bookmarked_at' => $faker->dateTimeBetween('-1 year', 'now'), // Tanggal bookmark acak dalam 1 tahun terakhir
            ]);
        }
    }
}
