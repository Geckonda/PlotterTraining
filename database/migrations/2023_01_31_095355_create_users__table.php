<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *$table->foreign('user_id')->references('id')->on('users');
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->foreignId('id_role')
                ->references('id_role')
                ->on('roles');
            $table->string('nickname');
            $table->string('aboutMe')->nullable();
            $table->string('login')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
