<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Application;

class SyncInterviewData extends Command
{
    protected $signature = 'sync:interviews';
    protected $description = 'Create interview records for applications with status "interview"';

    public function handle()
    {
        $apps = Application::with('post.hr')->where('application_status', 'interview')->get();
        $count = 0;

        foreach ($apps as $app) {
            if (!$app->interview) {
                $post = $app->post;
                $hr   = $post?->hr;
                $hrId = $hr?->id;

                if (!$post) {
                    $this->error("❌ Application ID {$app->id} has NO post.");
                    continue;
                }

                if (!$hr) {
                    $this->error("❌ Application ID {$app->id} (Post ID: {$post->id}) has NO HR.");
                    continue;
                }

                $app->interview()->create([
                    'hr_id' => $hrId,
                    'interview_time' => now()->addDays(3),
                    'location' => 'To be decided',
                ]);

                $this->info("✅ Interview created for Application ID: {$app->id} with HR ID: $hrId");
                $count++;
            }
        }

    }

}
