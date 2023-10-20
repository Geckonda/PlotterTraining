<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;


class UserController extends Controller
{


    public function register(Request $request){
        if($request->user) return redirect(route('home'));
        return view('register');
    }

    public function login(Request $request){
        if($request->user) return redirect(route('home'));
        return view('login');
    }

    public function  userCreate(Request $request){
        $messages = [
            'required' => 'Поле обязательно для заполнения'
        ];

        $request->merge(['id_role'=>2]);
        $data = $request->all();
        $fields = Validator::make($data, [
           'nickname' => 'required',
           'login' => 'required | unique:users',
            'email' =>'required | unique:users',
            'password' => 'required | min:6',
            'password_repeat' => 'required'
        ], $messages);
        if($fields->fails()){
            return redirect(url()->previous())
                ->withErrors($fields)
                ->withInput();
        }
        if ($data['password'] !== $data['password_repeat']) {
            return redirect(url()->previous())
                ->withErrors(['error' => 'Пароли не совпадают'])
                ->withInput();
        }
        User::create($data);
        return  redirect(route('login'))
            ->with(['msg' => 'Успешная регистрация']);
    }

    public function auth(Request $request){
        $messages = [
            'required' => 'Пустое поле'
        ];
        $fields = Validator::make($request->all(), [
           'login'=>'required',
           'password'=> 'required'
        ],$messages);
        if($fields->fails()){
            return redirect(url()->previous())
                ->withErrors($fields)
                ->withInput();
        }

        $login = $request->login;
        $password = $request->password;
        $user = User::where('login',$login)
            ->where('password', $password)
            ->first();

        if(!$user){
            return redirect(url()->previous())
                ->withErrors(['error' => 'Неверный логин или пароль'])
                ->withInput();
        }
        Auth::login($user);
        return redirect(route('index'))
            ->with(['msg' => 'Вы успешно авторизировались!']);
    }

    public function logout(Request $request){
        if($request->user) Auth::logout();
        return redirect(route('login'));
    }


}
