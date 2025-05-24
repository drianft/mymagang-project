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
        \App\Models\User::factory(10)->create();

        Company::factory(5)->create()->each(function ($company) {
            $hrs = Hr::factory(2)->create(['company_id' => $company->id]);
            $posts = Post::factory(3)->create([
                'company_id' => $company->id,
                'hr_id' => $hrs->random()->id
            ]);
        });

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
