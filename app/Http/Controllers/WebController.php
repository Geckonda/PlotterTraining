<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class WebController extends Controller
{
    public function notFoundPage(){
        return view('404');
    }
    public function index(){
        return view('about');
    }
    public function location(){
        return view('location');
    }
    public function catalog(){
        $books = DB::table('books')
            ->leftJoin('rating', 'rating.id_rate', '=','books.id_rate')
            ->leftJoin('genres', 'genres.id_genre', '=','books.id_genre')
            ->leftJoin('book-status', 'book-status.id_status', '=','books.id_status')
            ->where('id_modificator' , '=', '1')
            ->orderByDesc('id_book')
            ->get();
        return view('catalog',
            ['books' => $books]
        );
    }
    public function searchBooks(Request $request){
        $name = $request->name;
        $name = $name.'%';
        $books = DB::table('books')
            ->leftJoin('rating', 'rating.id_rate', '=','books.id_rate')
            ->leftJoin('genres', 'genres.id_genre', '=','books.id_genre')
            ->leftJoin('book-status', 'book-status.id_status', '=','books.id_status')
            ->where('id_modificator' , '=', '1')
            ->where('title', 'LIKE', $name)
            ->get();
        return view('catalog', [
            'books' => $books
        ]);
    }
    public function product($id_product){
        $product = DB::table('products')
            ->where('id_product', $id_product)
            ->first();
        return view('product',
            ['product' => $product]
        );
    }
}
