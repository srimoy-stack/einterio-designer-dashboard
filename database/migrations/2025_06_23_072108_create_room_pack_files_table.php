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
Schema::create('room_pack_files', function (Blueprint $table) {
    $table->id();
    $table->foreignId('room_pack_id')->constrained()->onDelete('cascade');
    $table->enum('type', ['cover', 'optional', 'pdf', 'chart']);
    $table->string('file_path')->nullable();
    $table->string('external_link')->nullable();
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
        Schema::dropIfExists('room_pack_files');
    }
};
