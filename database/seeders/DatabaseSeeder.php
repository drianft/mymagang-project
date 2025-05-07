<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 20; $i++){
            DB::table('users')->insert([
                'email' => $faker->email,
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'status' => 'active',
                'role' => 'applier',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'fullName' => $faker->name,
                'address' => $faker->address,
                'birth_date' => $faker->date,
            ]);
        }
    }
}
