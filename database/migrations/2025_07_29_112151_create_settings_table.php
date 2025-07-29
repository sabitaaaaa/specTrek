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
 DB::table('settings')->insert([
    'key' => 'site_logo',
    'value' => $path, // e.g., 'logo/your-file.png'
    'created_at' => now(),
    'updated_at' => now(),
]);


}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
