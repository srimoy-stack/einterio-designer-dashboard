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
Schema::create('time_logs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('designer_id')->constrained('users')->onDelete('cascade');
    $table->foreignId('room_pack_id')->constrained()->onDelete('cascade');
    $table->integer('hours'); // Could be float if needed
    $table->date('log_date');
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
        Schema::dropIfExists('time_logs');
    }
};
