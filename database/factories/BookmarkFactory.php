<?php

namespace Database\Factories;

use App\Models\Applier;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookmarkFactory extends Factory
{
    public function definition(): array
    {
        return [
            'applier_id' => Applier::factory(),
            'post_id' => Post::factory(),
            'saved_at' => now(),
        ];
    }
}
