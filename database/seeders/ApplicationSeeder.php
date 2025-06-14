<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    public function run()
    {
        $applications = [
            [
                'name' => 'Andrian James Siregar',
                'email' => 'andrianjin9@gmail.com',
                'position' => 'Senior Developer',
                'department' => 'Engineering',
                'education' => 'Computer Science, MIT',
                'applied_on' => now()->subDays(2)->format('Y-m-d'),
                'experience' => json_encode(['years' => 5, 'companies' => ['Google', 'Microsoft']]),
                'status' => 'Under Review',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lain sesuai kebutuhan
        ];

        Application::insert($applications);
    }
}
