<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    private function toDefaultPage(){
        return redirect(route('404'));
    }
    private function checkAdmin($request){
        return $request->user && $request->user->isAdmin();
    }

    public function adminPanel(Request $request){
        if($this->checkAdmin($request)){
             $categories = DB::table('categories')->get();
            return view('adminPanel', [
                'categories' => $categories
            ]);
        }
    }

    public function addProduct(Request $request){

        $img = $request->file('image');
        $typeImage = $img->extension();

        $uniqName = md5(uniqid(rand(), true));
        $nameImg = $uniqName.'.'.$typeImage;
        $pathFolder = 'images/products/';

        if(!$img->move(public_path($pathFolder), $nameImg)){
            return redirect(url()->previous())
                ->withErrors(['errorForImg ' => 'Что-то пошло не так, картинка не может сохраниться'])
                ->withInput();
        }
        $path = $pathFolder.$nameImg;
        DB::table('products')->insert([
            'id_category' => $request->id_category,
            'name_product' => $request->name_product,
            'price_product'=> $request->price_product,
            'description'=> $request->description,
            'count_product'=> $request->count_product,
            'path_product' => $path

        ]);
        return redirect(route('catalog'));
    }
}
