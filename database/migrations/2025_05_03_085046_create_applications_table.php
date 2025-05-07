<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applier_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('post_id')->constrained();
            $table->enum('status', ['applied', 'interviewed', 'accepted', 'rejected'])->default('applied'); // ✅ tambahkan kolom status
            $table->timestamp('applied_at')->nullable(); // ✅ tambahkan kolom tanggal lamaran
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
