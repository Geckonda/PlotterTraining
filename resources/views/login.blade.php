@extends('Layouts.layout')

@section('title')
    Авторизация
@endsection

@section('content')
        <div class="container d-flex align-items-center justify-content-center h-100">
            <div class="card p-5 card-field">
                <form class="d-flex flex-column  justify-content-center align-items-center" action="{{ route('auth') }}" method="post">
                    <h2>Авторизация</h2>
                    <div class="row mb-3 bg-black ">
                        <label for="login" class="col-sm-7 col-form-label">Логин</label>
                        <div class="col-sm-15">
                            <input type="text" class="form-control" name="login" value="{{ old('login') ?? ''}}">
                        </div>
                    </div>
                    @error('login')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="row mb-3">
                        <label for="password" class="col-sm-7 col-form-label">Password</label>
                        <div class="col-sm-15">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    @error('password')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Войти</button>

                </form>
                @error('error')
                <div class="alert alert-danger mt-3" role="alert">
                    {{ $message }}
                </div>
                @enderror
    </div>

@endsection
