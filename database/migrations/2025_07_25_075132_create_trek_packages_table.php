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
    Schema::create('trek_packages', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('subtitle')->nullable();
        $table->string('main_image')->nullable();
        $table->text('quote')->nullable();
        $table->text('hidden_gems')->nullable(); // JSON or text
        $table->text('best_time')->nullable();
        $table->text('itinerary')->nullable(); // Could also normalize into separate table
        $table->text('travel_options')->nullable(); // JSON table content
        $table->text('traditions')->nullable(); // bullet points
        $table->string('map_image')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trek_packages');
    }
};
