<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    static $admin = [
        'id_role' => '1',
        'role' => 'admin'
    ];
    static $user = [
        'id_role' => '2',
        'role' => 'user'
    ];
    public function up()
    {
        DB::table('roles')->insert(self::$admin);
        DB::table('roles')->insert(self::$user);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('roles')->where('id_role', range(1,3))->delete();
    }
};
