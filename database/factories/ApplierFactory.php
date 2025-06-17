<?php

namespace Database\Factories;

use App\Models\Applier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplierFactory extends Factory
{
    protected $model = Applier::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory()->applier(),
            'religion' => $this->faker->randomElement(['Islam', 'Christian', 'Hindu', 'Buddha']),
            'education' => $this->faker->randomElement(['SMA', 'D3', 'S1', 'S2']),
            'cv_url' => $this->faker->url,
        ];
    }
}
