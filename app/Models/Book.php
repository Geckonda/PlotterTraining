<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Book extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'books';

    protected $primaryKey ='id_book';

    public $timestamps = false;

    protected $fillable = [
        'id_book',
        'id_user',
        'id_modificator',
        'title',
        'id_rate',
        'id_genre',
        'id_status',
        'description',
        'book_cover',
    ];
}
