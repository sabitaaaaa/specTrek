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
        
        Schema::create('tours', function (Blueprint $table) { 
    $table->id();
    $table->string('name');
    $table->decimal('price', 8, 2);
    $table->integer('days')->nullable(); // optional
    $table->string('region')->nullable(); // optional
    $table->string('type')->nullable(); // Day Hike or Multi Day
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
