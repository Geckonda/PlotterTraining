<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    static $good = [
        'id_worldview' => '1',
        'worldview' => 'Положительный',
        'description' => 'Хороший'
    ];
    static $neutral = [
        'id_worldview' => '2',
        'worldview' => 'Нейтральный',
        'description' => 'Ни туда ни сюда'
    ];
    static $bad = [
        'id_worldview' => '3',
        'worldview' => 'Отрицательный',
        'description' => 'Плохой'
    ];
    public function up()
    {
        DB::table('worldviews')->insert(self::$good);
        DB::table('worldviews')->insert(self::$neutral);
        DB::table('worldviews')->insert(self::$bad);
    }

    public function down()
    {
        DB::table('worldviews')->where('id_worldview', 1)->delete();
        DB::table('worldviews')->where('id_worldview', 2)->delete();
        DB::table('worldviews')->where('id_worldview', 3)->delete();
    }
};
