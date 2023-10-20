<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    static $user = [
        'id_user' => '1',
        'id_role' => '2',
        'nickname' => 'Geckonda',
        'login' => 'Geckonda',
        'email' => 'Geckonda@yandex.ru',
        'password' => 'IntelligenceIsAGift!'
    ];
    static $admin = [
        'id_user' => '2',
        'id_role' => '1',
        'nickname' => 'admin',
        'login' => 'admin',
        'email' => 'admin@yandex.ru',
        'password' => 'admin11'
    ];

    public function up()
    {
        DB::table('users')->insert(self::$user);
        DB::table('users')->insert(self::$admin);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->where('id_user', 1)->delete();
        DB::table('users')->where('id_user', 2)->delete();
    }
};
