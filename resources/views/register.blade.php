@extends('Layouts.layout')

@section('title')
    Регистрация
@endsection

@section('content')
    <div class="container d-flex align-items-center justify-content-center h-100">
        <div class="card p-5 card-field">
            <form class="d-flex flex-column  justify-content-center align-items-center" action="{{ route('userCreate') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h2>Регистрация</h2>
                <div class="row mb-3 bg-black ">
                    <label for="nickname" class="col-sm-7 col-form-label">Введите никнейм*</label>
                    <div class="col-sm-15">
                        <input type="text" class="form-control" name="nickname" placeholder="Никнейм" value="{{ old('nickname') ?? '' }}">
                    </div>
                </div>
                <div class="row mb-3 bg-black ">
                    <label for="login" class="col-sm-7 col-form-label">Введите логин*</label>
                    <div class="col-sm-15">
                        <input type="text" class="form-control" name="login" placeholder="Логин" value="{{ old('login') ?? '' }}">
                    </div>
                </div>
                <div class="row mb-3 bg-black ">
                    <label for="email" class="col-sm-7 col-form-label">Введите email*</label>
                    <div class="col-sm-15">
                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') ?? '' }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-7 col-form-label">Введите пароль*</label>
                    <div class="col-sm-15">
                        <input type="password" class="form-control" name="password" placeholder="Пароль">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password_repeat" class="col-sm-7 col-form-label">Введите пароль еще раз*</label>
                    <div class="col-sm-15">
                        <input type="password" class="form-control" name="password_repeat" placeholder="Подтверждение пароля">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="image" class="col-sm-7 col-form-label">Аватар</label>
                    <div class="col-sm-15">
                        <input type="file" class="form-control" name="image" >
                    </div>
                </div>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach
                @endif
                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            </form>
        </div>

@endsection
