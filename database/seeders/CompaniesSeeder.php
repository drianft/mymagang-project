<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat 1 data manual
        // Post::create([
        //     'user_id' => 1,
        //     'company_id' => 2,
        //     'job_description' => 'Admin Only Job',
        //     'working_hour' => 'Full Time',
        //     'salary' => '8000000',
        //     'status' => 'active',
        //     'job_category' => 'Management',
        // ]);

        // // Lalu generate 10 data acak
        // Post::factory()->count(10)->create();

        // Buat user admin
        // Company::create([
        //     'name' => 'PT MagangKuy',
        //     'email' => 'MagangKuy@example.com',
        //     'password' => Hash::make('12345678'), // password default
        //     'industri' => 'IT',
        //     'address' => 'Jl. Raya No. 1',
        //     'description' => 'Perusahaan IT terkemuka di Indonesia',
        // ]);

        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
        Company::create([
        'name' => $faker->company,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('12345678'),
        'industri' => $faker->randomElement(['IT', 'Finance', 'Healthcare', 'Education']),
        'address' => $faker->address,
        'description' => $faker->catchPhrase,
        ]);
}



        // (Optional) assign role kalau pakai Spatie Permissions
        // $admin->assignRole('admin');

        // Buat user biasa random
        // Company::factory(10)->create([
        //     'role' => 'applier', // role user biasa
        // ]);

    }
}
