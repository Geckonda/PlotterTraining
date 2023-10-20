<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    static $ongoing = [
        'id_status' => '1',
        'status' => 'В процессе'
    ];
    static $finished = [
        'id_status' => '2',
        'status' => 'Завершен'
    ];
    static $frozen = [
        'id_status' => '3',
        'status' => 'Заморожен'
    ];
    static $abandoned = [
        'id_status' => '4',
        'status' => 'Заброшен'
    ];
    public function up()
    {
        DB::table('book-status')->insert(self::$ongoing);
        DB::table('book-status')->insert(self::$finished);
        DB::table('book-status')->insert(self::$frozen);
        DB::table('book-status')->insert(self::$abandoned);
    }

    public function down()
    {
        DB::table('book-status')->where('id_status', 1)->delete();
        DB::table('book-status')->where('id_status', 2)->delete();
        DB::table('book-status')->where('id_status', 3)->delete();
        DB::table('book-status')->where('id_status', 4)->delete();
    }
};
