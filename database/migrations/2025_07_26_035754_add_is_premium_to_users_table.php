<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Only add the column if it doesn't exist
        if (!Schema::hasColumn('users', 'is_premium')) {
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('is_premium')->default(false);
            });
        }
    }

    public function down(): void {
        // Rollback safely
        if (Schema::hasColumn('users', 'is_premium')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('is_premium');
            });
        }
    }
};
