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
        Schema::table('users', function(Blueprint $table) {
            $table->string('fullName')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('address')->nullable();
            $table->date('birth_date')->nullable()->after('address'); // ✅ tambahkan kolom tanggal lahir
            $table->string('password')->default(bcrypt('default_password'))->change(); // ✅ tambahkan hash default
            $table->rememberToken()->nullable()->change(); // optional: pakai helper
            $table->timestamp('email_verified_at')->nullable()->change(); // ✅ bukan string
            $table->timestamp('created_at')->nullable()->change(); // ✅ bukan string
            $table->timestamp('updated_at')->nullable()->change(); // ✅ bukan string
            $table->enum('status', ['active', 'inactive'])->default('active')->after('email_verified_at'); // ✅ tambahkan kolom status
            $table->enum('role', ['applier', 'superadmin', 'hr'])->default('applier')->after('status'); // ✅ tambahkan kolom role

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status'); // ❗ Hanya hapus kolom yang kamu tambahkan
        });
    }
};
