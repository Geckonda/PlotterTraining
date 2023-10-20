<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;
use Validator;

class AuthorController extends Controller
{
    //Подумать,куда можно перенести это метод
    public function pushImage($request, $inputName, $imageFolder){
        $img = $request->file($inputName);

        if($img == null){
            return null;
        }
        $typeImage = $img->extension();

        $uniqName = md5(uniqid(rand(), true));
        $nameImg = $uniqName.'.'.$typeImage;
        $pathFolder = 'images/'.$imageFolder.'/';

        if(!$img->move(public_path($pathFolder), $nameImg)){
            return null;
        }
        return $path = $pathFolder.$nameImg;
    }


    public function myBooks(Request $request){
        if(!$request->user) return redirect(route('index'));
        $books = DB::table('books')
            ->where('id_user', $request->user->id_user)
            ->orderByDesc('id_book')
            ->get();
        return view('myBooks', [
            'books' => $books
        ]);
    }
    public function myIdeas(Request $request)
    {
        if (!$request->user) return redirect(route('index'));
        $ideas = DB::table('ideas')
            ->where('id_user', $request->user->id_user)
            ->get();
        return view('myIdeas', [
            'ideas' => $ideas
        ]);
    }
    public function ideaCreationForm(Request $request){
        if (!$request->user) return redirect(route('index'));
        return view('ideas.ideaCreationForm');
    }


   public function ideaCreate(Request $request){
       if (!$request->user) return redirect(route('index'));
       $messages = ['required' => 'Поле  обязательное для заполнения'];

       $request->merge(['data_creation' => date("Y-m-d h:i:s")]);
       $request->merge(['id_user' => $request->user->id_user]);

       $data = $request->all();
       $fields = Validator::make($data, [
           'topic' => 'required',
       ], $messages);
       if($fields->fails()) {
           return redirect(url()->previous())
               ->withErrors($fields)
               ->withInput();
       }
       DB::table('ideas')->insert([
           'id_user' => $request->id_user,
           'topic' => $request->topic,
           'data_creation' => $request->data_creation,
           'description' => $request->description
       ]);

       return redirect(route('myIdeas'))
           ->with(['msg' => 'Успешное добавление идеи!']);
   }


    public function bookCreationForm(Request $request){
        if (!$request->user) return redirect(route('index'));
        $modificators = DB::table('access_modificator')->get();
        $rating = DB::table('rating')->get();
        $genres = DB::table('genres')->get();
        $statuses = DB::table('book-status')->get();
        return view('books.bookCreationForm', [
            'modificators' => $modificators,
            'rating' => $rating,
            'genres' => $genres,
            'statuses' => $statuses,
        ]);
    }
    public function bookCreate(Request $request){
        if (!$request->user) return redirect(route('index'));
        $messages = ['required' => 'Поле  обязательное для заполнения'];

        $data = $request->all();
        $fields = Validator::make($data, [
            'title' => 'required',
            'description' => 'required'
        ], $messages);
        if($fields->fails()) {
            return redirect(url()->previous())
                ->withErrors($fields)
                ->withInput();
        }


        $book_cover = $this->pushImage($request, 'image', 'books/booksCovers');

        if(!$book_cover) {
            $book_cover = 'images/default/defaultBookCover.png';
        }

        DB::table('books')->insert([
            'id_user' =>  $request->user->id_user,
            'id_modificator' =>  $request->id_modificator,
            'title' =>  $request->title,
            'id_rate' =>  $request->id_rate,
            'id_genre' =>  $request->id_genre,
            'id_status' =>  $request->id_status,
            'description' =>  $request->description,
            'book_cover' =>   $book_cover
        ]);
        return  redirect(route('myBooks'))
            ->with(['msg' => 'Успешное добавление книги!']);

    }

    public function bookUpdateForm(Request $request, $id){
        if(!$request->user) return redirect(route('index'));
        $book = DB::table('books')
            ->leftJoin('rating', 'rating.id_rate', '=','books.id_rate')
            ->leftJoin('genres', 'genres.id_genre', '=','books.id_genre')
            ->leftJoin('book-status', 'book-status.id_status', '=','books.id_status')
            ->leftJoin('access_modificator', 'access_modificator.id_modificator', '=','books.id_modificator')
            ->where('id_book', $id)
            ->first();
        $modificators = DB::table('access_modificator')
            ->whereNot('id_modificator', $book->id_modificator)
            ->get();

        $rating = DB::table('rating')
            ->whereNot('id_rate', $book->id_rate)
            ->get();

        $genres = DB::table('genres')
            ->whereNot('id_genre', $book->id_genre)
            ->get();
        $statuses = DB::table('book-status')
            ->whereNot('id_status', $book->id_status)
            ->get();
        if(!$book) return redirect(route('404'));

        return view('books.updateBook', [
            'book' => $book,
            'modificators' => $modificators,
            'rating' => $rating,
            'genres' => $genres,
            'statuses' => $statuses,
        ]);
    }
    public function bookUpdate(Request $request, $id){
        if(!$request->user) return redirect(route('index'));
        $messages = ['required' => 'Поле  обязательное для заполнения'];

        $data = $request->all();
        $fields = Validator::make($data, [
            'title' => 'required',
            'description' => 'required'
        ], $messages);
        if($fields->fails()) {
            return redirect(url()->previous())
                ->withErrors($fields)
                ->withInput();
        }


        DB::table('books')
            ->where('id_book', $id )
            ->update([
            'id_user' =>  $request->user->id_user,
            'id_modificator' =>  $request->id_modificator,
            'title' =>  $request->title,
            'id_rate' =>  $request->id_rate,
            'id_genre' =>  $request->id_genre,
            'id_status' =>  $request->id_status,
            'description' =>  $request->description,
        ]);
        return  redirect(route('myBooks'))
            ->with(['msg' => 'Книга успешно отредактирована!']);
    }


    public function searchMyBooks(Request $request){
        if(!$request->user) return redirect(route('index'));
        $name = $request->name;
        $name = $name.'%';
        $books = DB::table('books')
            ->where('id_user', $request->user->id_user)
            ->where('title', 'LIKE', $name)
            ->get();
        return view('myBooks', [
            'books' => $books
        ]);
    }
    public function myOwnBook(Request $request, $id){
        $book = DB::table('books')
            ->leftJoin('rating', 'rating.id_rate', '=','books.id_rate')
            ->leftJoin('genres', 'genres.id_genre', '=','books.id_genre')
            ->leftJoin('book-status', 'book-status.id_status', '=','books.id_status')
            ->where('id_book', $id)
            ->first();
        if(!$book) return redirect(route('404'));

        return view('books.myOwnBook', [
            'book' => $book
        ]);
    }

    public function getAllCharacters(Request $request, $id_book){
        $characters = DB::table('characters')
            ->leftJoin('books-characters', 'books-characters.id_character', '=', 'characters.id_character')
            ->where('books-characters.id_book', $id_book )
            ->get();
        $book = DB::table('books')
            ->where('id_book', $id_book )
            ->first();
        return view('books.characters.allCharacters', [
            'characters' => $characters,
            'book' => $book,
        ]);
    }

    public function characterCreateForm(Request $request, $id){
        $worldviews = DB::table('worldviews')->get();
        return view('books.characters.characterCreateForm', [
            'id_book' => $id,
            'worldviews' => $worldviews
        ]);
    }

    public function characterCreate(Request $request, $id_book){
        if (!$request->user) return redirect(route('index'));
        $messages = ['required' => 'Поле  обязательное для заполнения'];

        $request->merge(['id_user' => $request->user->id_user]);
        $data = $request->all();
        $fields = Validator::make($data, [
            'name' => 'required',
            'image' => 'required'
        ], $messages);
        if($fields->fails()) {
            return redirect(url()->previous())
                ->withErrors($fields)
                ->withInput();
        }


        $characterPictures = $this->pushImage($request, 'image', 'books/characterPictures');

        if(!$characterPictures) {
            return redirect(url()->previous())
                ->withErrors(['errorForImg ' => 'Что-то пошло не так, картинка не может сохраниться'])
                ->withInput();
        }
        DB::table('characters')->insert([
            'id_user' =>  $request->user->id_user,
            'name' =>  $request->name,
            'birthday' =>  $request->birthday,
            'race' =>  $request->race,
            'gender' =>  $request->gender,
            'height' =>  $request->height,
            'weigh' =>  $request->weigh,
            'personality' =>  $request->personality,
            'appearance' =>  $request->appearance,
            'goals' =>  $request->goals,
            'motivation' =>  $request->motivation,
            'history' =>  $request->history,
            'id_worldview' =>  $request->id_worldview ,
            'picture' =>   $characterPictures
        ]);

        $id_character = DB::table('characters')
            ->select('id_character')
            ->orderByDesc('id_character')
            ->first();


        DB::table('books-characters')->insert([
            'id_book' => $id_book,
            'id_character' => $id_character->id_character,
        ]);


        return  redirect(route('getAllCharacters', ['id' => $id_book]))
            ->with(['msg' => 'Успешное добавление персонажа!']);

    }
    public function searchMyCharacters(Request $request, $id_book){
        $name = $request->name;
        $name = $name.'%';
        $characters = DB::table('characters')
            ->leftJoin('books-characters', 'books-characters.id_character', '=', 'characters.id_character')
            ->where('books-characters.id_book', $id_book)
            ->where('name', 'LIKE', $name)
            ->get();
        $book = DB::table('books')
            ->where('id_book', $id_book)
            ->first();
        return view('books.characters.allCharacters', [
            'characters' => $characters,
            'book' => $book
        ]);
    }
}
