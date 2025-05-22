<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Posts;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(UserSeeder::class);
        $this->call(CompaniesSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(ApplicationSeeder::class);
        $this->call(BookmarkSeeder::class);
        $this->call(InterviewSeeder::class);
    }
}
