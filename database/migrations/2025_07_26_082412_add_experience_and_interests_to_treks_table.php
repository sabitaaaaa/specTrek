<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('treks', function (Blueprint $table) {
        $table->string('experience_level')->nullable()->after('difficulty');
        $table->text('interest_tags')->nullable()->after('experience_level');
    });
}

public function down()
{
    Schema::table('treks', function (Blueprint $table) {
        $table->dropColumn(['experience_level', 'interest_tags']);
    });
}

};
