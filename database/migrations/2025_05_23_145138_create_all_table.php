<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Companies
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_email')->unique();
            $table->string('company_address');
            $table->string('industry')->nullable();
            $table->text('company_description')->nullable();
            $table->date('joined_at')->nullable();
            $table->timestamps();
        });

        // HRs
        Schema::create('hrs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('position')->nullable();
            $table->timestamps();
        });

        // Appliers
        Schema::create('appliers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('religion')->nullable();
            $table->string('education')->nullable();
            $table->string('cv_url')->nullable();
            $table->timestamps();
        });

        // Posts
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hr_id')->constrained('hrs')->onDelete('cascade');
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->text('job_description');
            $table->string('working_hour')->nullable();
            $table->decimal('salary', 12, 2)->nullable();
            $table->enum('status', ['open', 'closed', 'draft'])->default('open');
            $table->string('job_category')->nullable();
            $table->timestamps();
        });

        // Applications
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applier_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->enum('application_status', ['pending', 'interview', 'accepted', 'rejected'])->default('pending');
            $table->timestamp('applied_at')->nullable();
            $table->timestamps();

            $table->unique(['applier_id', 'post_id']);
        });

        // Interviews
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained()->onDelete('cascade');
            $table->foreignId('hr_id')->constrained('hrs')->onDelete('cascade');
            $table->timestamp('interview_time')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
        });

        // Bookmarks
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->foreignId('applier_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->timestamp('saved_at')->nullable();

            $table->primary(['applier_id', 'post_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookmarks');
        Schema::dropIfExists('interviews');
        Schema::dropIfExists('applications');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('appliers');
        Schema::dropIfExists('hrs');
        Schema::dropIfExists('companies');
    }
};
