<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'company_name' => $this->faker->company,
            'company_email' => $this->faker->unique()->companyEmail,
            'company_address' => $this->faker->address,
            'industry' => $this->faker->word,
            'company_description' => $this->faker->paragraph,
            'joined_at' => now(),
        ];
    }
}
