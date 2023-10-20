<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WebController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [\App\Http\Controllers\WebController::class, 'index'] )->name('index');

//Поиск книг в каталоге
Route::post('/searchBooks', [WebController::class, 'searchBooks'])->name('searchBooks');

Route::middleware('getUser')->group(function () {
    Route::get('/register', [\App\Http\Controllers\UserController::class, 'register'])->name('register');
    Route::get('/login', [\App\Http\Controllers\UserController::class, 'login'])-> name('login');
    Route::post('/auth' ,[\App\Http\Controllers\UserController::class, 'auth'])->name('auth');
    Route::post('/user/create', [\App\Http\Controllers\UserController::class, 'userCreate'])->name('userCreate');

    Route::match(['get','post','delete'], 'logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');




/*    Функционал Автора*/
    Route::get('/myBooks', [AuthorController::class, 'myBooks'] )->name('myBooks');//Возвращает все книги пользователя
    Route::get('/myIdeas', [AuthorController::class, 'myIdeas'])->name('myIdeas');//Возвращает все идеи пользователя

    Route::get('/bookCreationForm', [AuthorController::class, 'bookCreationForm'])->name('bookCreationForm');
    Route::post('/bookCreate', [AuthorController::class, 'bookCreate'])->name('bookCreate');
    Route::get('/bookUpdateForm/{id}', [AuthorController::class, 'bookUpdateForm'])->name('bookUpdateForm');
    Route::post('/bookUpdate/{id}', [AuthorController::class, 'bookUpdate'])->name('bookUpdate');

    //Идеи
    //Страница всех идей
    Route::get('/ideaCreationForm', [AuthorController::class, 'ideaCreationForm'])->name('ideaCreationForm');
    Route::post('/ideaCreate', [AuthorController::class, 'ideaCreate'])->name('ideaCreate');


    //Переход на страницу к книге.
    Route::get('/myOwnBook/{id}', [AuthorController::class, 'myOwnBook'])->name('myOwnBook');

    /*Поиск книги*/
    Route::post('/searchMyBooks', [AuthorController::class, 'searchMyBooks'])->name('searchMyBooks');


    //Персонажи
    Route::get('/myOwnBook/{id}/allCharacters/', [AuthorController::class, 'getAllCharacters'])->name('getAllCharacters');

    Route::get('/myOwnBook/{id}/characterCreateForm', [AuthorController::class, 'characterCreateForm'])->name('characterCreateForm');
    Route::post('/characterCreate/{id}', [AuthorController::class, 'characterCreate'])->name('characterCreate');

    //Поиск персонажа
    Route::post('/searchMyCharacters/{id}', [AuthorController::class, 'searchMyCharacters'])->name('searchMyCharacters');

});
Route::get('/404', [\App\Http\Controllers\WebController::class, 'notFoundPage'])->name('404');
Route::get('/catalog', [\App\Http\Controllers\WebController::class, 'catalog'])->name('catalog');
Route::get('/product/{id_product}', [\App\Http\Controllers\WebController::class, 'product'])->name('product');
