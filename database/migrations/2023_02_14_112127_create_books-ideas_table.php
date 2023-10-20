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
        Schema::create('books-ideas', function (Blueprint $table) {
            $table->id('books-ideas');
            $table->foreignId('id_book')
                ->references('id_book')
                ->on('books')
                ->onDelete('cascade');
            $table->foreignId('id_idea')
                ->references('id_idea')
                ->on('ideas')
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
        Schema::dropIfExists('books-ideas');
    }
};
