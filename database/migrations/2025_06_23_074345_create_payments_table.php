<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
Schema::create('payments', function (Blueprint $table) {
    $table->id();
    $table->foreignId('designer_id')->constrained('users')->onDelete('cascade');
    $table->decimal('amount', 10, 2);
    $table->enum('status', ['pending', 'paid'])->default('pending');
    $table->date('paid_on')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
