<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    static $public = [
        'id_modificator' => '1',
        'name' => 'Публично'
    ];
    static $private = [
        'id_modificator' => '2',
        'name' => 'Приватно'
    ];

    public function up()
    {
        DB::table('access_modificator')->insert(self::$public);
        DB::table('access_modificator')->insert(self::$private);
    }

    public function down()
    {
        DB::table('access_modificator')->where('id_modificator', 1)->delete();
        DB::table('access_modificator')->where('id_modificator', 2)->delete();
    }
};
