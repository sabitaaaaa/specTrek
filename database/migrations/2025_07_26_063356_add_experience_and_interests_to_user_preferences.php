<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('user_preferences', function (Blueprint $table) {
        $table->string('experience_level')->nullable(); // e.g., Beginner, Moderate, Advanced
        $table->json('interest_tags')->nullable();      // e.g., ["lakes", "culture", "mountains"]
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_preferences', function (Blueprint $table) {
            //
        });
    }
};
