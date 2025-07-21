<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('treks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('price');
            $table->integer('duration_days');
            $table->string('best_season')->nullable();
            $table->string('difficulty')->nullable();
            $table->string('region')->nullable();
            $table->integer('max_altitude')->nullable();
            $table->string('group_size')->nullable();
            $table->string('accommodation')->nullable();
            $table->timestamps();
        });
    }
};
