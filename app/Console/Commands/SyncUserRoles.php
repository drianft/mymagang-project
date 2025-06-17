<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Hr;
use App\Models\Company;

class SyncUserRoles extends Command
{
    protected $signature = 'sync:user-roles';
    protected $description = 'Sync user roles by ensuring HR and Company records exist';

    public function handle()
    {
        // Sync HRs
        $hrUsers = User::where('roles', 'hr')->doesntHave('hr')->get();
        foreach ($hrUsers as $user) {
            Hr::create([
                'user_id' => $user->id,
                'company_id' => 1,      //Jika diubah dari phpMyAdmin, dia secara langsung data company 1
                'position' => 'Staff',
            ]);
            $this->info("Created HR for user ID {$user->id}");
        }

        // Sync Companies
        $companyUsers = User::where('roles', 'company')->doesntHave('company')->get();
        foreach ($companyUsers as $user) {
            Company::create([
                'user_id' => $user->id,
                'industry' => 'freelance',
                'company_description' => '',
                'joined_at' => now(),
            ]);
            $this->info("Created Company for user ID {$user->id}");
        }

        $this->info('✅ Sync completed.');
    }
}
