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
            'job_description' => $this->faker->paragraph,
            'working_hour' => '9-5',
            'salary' => $this->faker->numberBetween(3000000, 15000000),
            'status' => 'open',
            'job_category' => $this->faker->word,
        ];
    }
}
