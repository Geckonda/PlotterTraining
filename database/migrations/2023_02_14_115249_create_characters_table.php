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
        Schema::create('characters', function (Blueprint $table) {
            $table->id('id_character');
            $table->foreignId('id_user')
                ->references('id_user')
                ->on('users');
            $table->string('name');
            $table->date('birthday')->nullable();
            $table->string('race')->nullable();
            $table->string('gender')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weigh')->nullable();
            $table->text('personality')->nullable();
            $table->text('appearance')->nullable();
            $table->text('goals')->nullable();
            $table->text('motivation')->nullable();
            $table->text('history')->nullable();
            $table->string('picture')->nullable();
            $table->foreignId('id_worldview')
                ->references('id_worldview')
                ->on('worldviews');
            $table->date('death_day')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
};
