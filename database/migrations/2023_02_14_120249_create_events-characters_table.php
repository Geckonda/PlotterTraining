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
        Schema::create('events-characters', function (Blueprint $table) {
            $table->id('events-characters');
            $table->foreignId('id_event')
                ->references('id_event')
                ->on('events')
                ->onDelete('cascade');
            $table->foreignId('id_character')
                ->references('id_character')
                ->on('characters')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events-characters');
    }
};
