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
    if (!DB::table('settings')->where('key', 'site_logo')->exists()) {
        DB::table('settings')->insert([
            'key' => 'site_logo',
            'value' => 'upload/logo/1753609018_logoforlandingpage.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
