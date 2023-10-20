<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $primaryKey ='id_user';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_role',
        'nickname',
        'aboutMe',
        'login',
        'email',
        'password',
        'avatar',
    ];
    protected $hidden = [
        'password'
    ];

    public function isAdmin(){
        if($this->id_role === 1)
            return true;
        return  false;
    }
    public function isBookOwner($id_book){
        $user = DB::table('books')
            ->where(['id_book'=> $id_book ])
            ->first();
        if($this->id_user === $user->id_user)
            return true;
        return false;
    }
}
