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
        Schema::create('books', function (Blueprint $table) {
            $table->id('id_book');
            $table->foreignId('id_user')
                ->references('id_user')
                ->on('users');
            $table->foreignId('id_modificator')
                ->references('id_modificator')
                ->on('access_modificator');
            $table->string('title');
            $table->foreignId('id_rate')
                ->references('id_rate')
                ->on('rating');
            $table->foreignId('id_genre')
                ->references('id_genre')
                ->on('genres');
            $table->foreignId('id_status')
                ->references('id_status')
                ->on('book-status');
            $table->text('description');
            $table->string('book_cover')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
