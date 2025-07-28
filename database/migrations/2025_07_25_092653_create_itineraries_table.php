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
        Schema::create('itineraries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();

            $table->text('hidden_gems');
            $table->text('best_time');
            $table->text('day_to_day_itinerary');
            $table->text('detailed_itinerary');
            $table->text('transport_table'); // can store HTML or plain text
            $table->text('note');
            $table->text('hidden_traditions'); // can store cultural notes, plain text or HTML
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itineraries');
    }
};