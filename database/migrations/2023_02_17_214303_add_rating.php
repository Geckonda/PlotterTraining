<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    static $NC18 = [
        'id_rate' => '1',
        'rate' => '18+'
    ];
    static $NC16 = [
        'id_rate' => '2',
        'rate' => '16+'
    ];
    static $pg12 = [
        'id_rate' => '3',
        'rate' => '12+'
    ];
    static $pg6 = [
        'id_rate' => '4',
        'rate' => '6+'
    ];
    static $G0 = [
        'id_rate' => '5',
        'rate' => '0+'
    ];
    public function up()
    {
        DB::table('rating')->insert(self::$NC18);
        DB::table('rating')->insert(self::$NC16);
        DB::table('rating')->insert(self::$pg12);
        DB::table('rating')->insert(self::$pg6);
        DB::table('rating')->insert(self::$G0);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('rating')->where('id_rate', 1)->delete();
        DB::table('rating')->where('id_rate', 2)->delete();
        DB::table('rating')->where('id_rate', 3)->delete();
        DB::table('rating')->where('id_rate', 4)->delete();
        DB::table('rating')->where('id_rate', 5)->delete();
    }
};
