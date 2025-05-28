<?php

namespace Database\Factories;

use App\Models\Interview;
use App\Models\Application;
use App\Models\Hr;
use Illuminate\Database\Eloquent\Factories\Factory;

class InterviewFactory extends Factory
{
    protected $model = Interview::class;

    public function definition(): array
    {
        return [
            'application_id' => Application::factory(),
            'hr_id' => Hr::factory(),
            'interview_time' => $this->faker->dateTimeBetween('+1 days', '+1 week'),
            'location' => $this->faker->address,
        ];
    }
}
