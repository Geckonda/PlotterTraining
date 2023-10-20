<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    static $adventures = [
        'id_genre' => '1',
        'genre' => 'Приключения'
    ];
    static $horrors = [
        'id_genre' => '2',
        'genre' => 'Ужасы'
    ];
    static $dramas = [
        'id_genre' => '3',
        'genre' => 'Драма'
    ];
    static $romantics = [
        'id_genre' => '4',
        'genre' => 'Романтика'
    ];
    static $articles = [
        'id_genre' => '5',
        'genre' => 'Статья'
    ];
    public function up()
    {
        DB::table('genres')->insert(self::$adventures);
        DB::table('genres')->insert(self::$horrors);
        DB::table('genres')->insert(self::$dramas);
        DB::table('genres')->insert(self::$romantics);
        DB::table('genres')->insert(self::$articles);
    }


    public function down()
    {
        DB::table('genres')->where('id_genre', 1)->delete();
        DB::table('genres')->where('id_genre', 2)->delete();
        DB::table('genres')->where('id_genre', 3)->delete();
        DB::table('genres')->where('id_genre', 4)->delete();
        DB::table('genres')->where('id_genre', 5)->delete();
    }
};
