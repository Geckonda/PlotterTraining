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
        Schema::create('books-characters', function (Blueprint $table) {
            $table->id('books-characters');
            $table->foreignId('id_book')
                ->references('id_book')
                ->on('books')
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
        Schema::dropIfExists('books-characters');
    }
};
