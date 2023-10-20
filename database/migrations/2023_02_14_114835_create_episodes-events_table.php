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
        Schema::create('episodes-events', function (Blueprint $table) {
            $table->id('episodes-events');
        $table->foreignId('id_episode')
            ->references('id_episode')
            ->on('episodes')
            ->onDelete('cascade');
        $table->foreignId('id_event')
            ->references('id_event')
            ->on('events')
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
        Schema::dropIfExists('episodes-events');
    }
};
