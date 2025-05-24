<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Hr;
use App\Models\Applier;
use App\Models\Post;
use App\Models\Application;
use App\Models\Interview;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat company (otomatis create user dengan role = company)
        Company::factory(5)->create()->each(function ($company) {

            // Buat 2 HR untuk tiap company
            Hr::factory(2)->create([
                'company_id' => $company->id
            ]);

            // Buat 3 post tiap company dari HR random
            Post::factory(3)->create([
                'company_id' => $company->id,
                'hr_id' => $company->hrs->random()->id // Make sure you define relation
            ]);
        });

        // Buat 10 applier
        Applier::factory(10)->create()->each(function ($applier) {
            $posts = \App\Models\Post::inRandomOrder()->take(3)->get();

            foreach ($posts as $post) {
                $application = \App\Models\Application::factory()->create([
                    'applier_id' => $applier->id,
                    'post_id' => $post->id
                ]);

                \App\Models\Interview::factory()->create([
                    'application_id' => $application->id,
                    'hr_id' => $post->hr_id
                ]);

                $applier->bookmarks()->attach($post->id, ['saved_at' => now()]);
            }
        });
    }
}
