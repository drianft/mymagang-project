<?php

namespace Database\Factories;

namespace Database\Factories;

use App\Models\Hr;
use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class HrFactory extends Factory
{
    protected $model = Hr::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory()->hr(),
            'company_id' => Company::factory(),
            'position' => $this->faker->jobTitle,
        ];
    }
}
