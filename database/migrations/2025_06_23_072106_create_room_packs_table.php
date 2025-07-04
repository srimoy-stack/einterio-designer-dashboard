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
Schema::create('room_packs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('designer_id')->constrained('users')->onDelete('cascade');
    $table->string('title');
    $table->string('quality_tier')->default('basic');
    $table->boolean('sop_followed')->default(true);
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
        Schema::dropIfExists('room_packs');
    }
};
