<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Hr;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'hr_id' => Hr::factory(),
            'company_id' => Company::factory(),
            'job_title' => $this->faker->jobTitle,
            'job_description' => $this->faker->paragraph,
            'working_hour' => '9',
            'salary' => $this->faker->numberBetween(3000000, 15000000),
            'status' => 'open',
            'job_type' => $this->faker->randomElement(['full-time', 'part-time', 'freelance']),
            'job_category' => $this->faker->word,

            'total_views' => $this->faker->numberBetween(0, 1000),
            'total_appliers' => $this->faker->numberBetween(0, 1000),

        ];
    }
}
