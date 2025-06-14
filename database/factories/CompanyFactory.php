<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory()->company(),
            'industry' => $this->faker->randomElement(['tech', 'finance', 'healthcare', 'education', 'sales', 'engineering', 'law', 'fnb', 'logistic', 'freelance']),
            'company_description' => $this->faker->paragraph,
            'joined_at' => now(),
        ];
    }
}
