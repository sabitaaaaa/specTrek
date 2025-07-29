<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1) Create the settings table
        Schema::create('settings', function (Blueprint $table) {
            $table->id();                  // Primary key
            $table->string('key')->unique();   // Key column, unique
            $table->string('value')->nullable(); // Value column, can be null
            $table->timestamps();          // created_at and updated_at timestamps
        });

        // 2) Insert default site_logo setting
        DB::table('settings')->insert([
            'key' => 'site_logo',
            'value' => 'upload/logo/1753609018_logoforlandingpage.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
