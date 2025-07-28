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
    Schema::table('user_trek_views', function (Blueprint $table) {
        $table->dropForeign(['trek_id']);
        $table->dropColumn('trek_id');

        $table->foreignId('itinerary_id')->constrained()->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('user_trek_views', function (Blueprint $table) {
        $table->dropForeign(['itinerary_id']);
        $table->dropColumn('itinerary_id');

        $table->foreignId('trek_id')->constrained()->onDelete('cascade');
    });
}

};
