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
        Schema::create('user_preferences', function (Blueprint $table) {
            
    $table->id();
    $table->foreignId('user_id')->constrained();
    // ->onDelete('cascade');
    $table->integer('budget')->nullable();
    $table->integer('available_days')->nullable();
    $table->string('difficulty_pref')->nullable();
    $table->string('interest_tags')->nullable(); // example: region
    $table->string('season_pref')->nullable();
    $table->text('expectation_notes')->nullable();
    $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_preferences');
    }
};
