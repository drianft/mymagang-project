<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
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
