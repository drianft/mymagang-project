<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\Applier;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    public function definition(): array
    {
        return [
            'applier_id' => Applier::factory(),
            'post_id' => Post::factory(),
            'application_status' => $this->faker->randomElement(['pending', 'interview', 'accepted', 'rejected']),
            'applied_at' => now(),
        ];
    }
}
