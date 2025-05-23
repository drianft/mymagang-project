<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user admin
        // $admin = User::factory()->create([
        //     'name' => 'Admin User',
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('admin123'), // password default
        //     'role' => 'admin', // role admin
        // ]);

        // // (Optional) assign role kalau pakai Spatie Permissions
        // // $admin->assignRole('admin');

        // // Buat user biasa random
        // User::factory(10)->create([
        //     'role' => 'applier', // role user biasa
        // ]);


        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('12345678'), // password default
                'role' => 'applier', // role user biasa
            ]);
        }
    }
}
