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
    Schema::table('itineraries', function (Blueprint $table) {
        $table->unsignedBigInteger('trek_id')->nullable()->after('id');

        // Foreign key constraint to treks table
        $table->foreign('trek_id')->references('id')->on('treks')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('itineraries', function (Blueprint $table) {
        $table->dropForeign(['trek_id']);
        $table->dropColumn('trek_id');
    });
}
};
