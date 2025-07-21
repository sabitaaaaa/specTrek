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
        Schema::create('premium_payments', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('transaction_id')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('status')->default('pending');
=======
>>>>>>> feature/trekking-mapp
            $table->timestamps();
        });
    }

<<<<<<< HEAD

=======
>>>>>>> feature/trekking-mapp
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('premium_payments');
    }
};
