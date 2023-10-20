@extends('Layouts.layout')

@section('title')
    Создание персонажа
@endsection

@section('content')
    <div class="container d-flex align-items-center justify-content-center h-100">
        <div class="card p-5 card-field">
            <form class="d-flex flex-column  justify-content-center align-items-center" action="{{ route('characterCreate', ['id' => $id_book]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <h2>Создание персонажа</h2>
                <div class="row mb-3 bg-black ">
                    <label for="name" class="col-form-label">Полное имя</label>
                    <div class="col-sm-15">
                        <input type="text" class="form-control" name="name" value="{{ old('name') ?? '' }}">
                    </div>
                </div>
                @error('name')
                <div class="mt-2">
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                </div>
                @enderror
                <div class="row mb-3 bg-black ">
                    <label for="birthday" class="col-form-label">Дата рождения</label>
                    <div class="col-sm-15">
                        <input type="date" class="form-control" name="birthday" value="2000-01-01">
                    </div>
                </div>
                <div class="row mb-3 bg-black ">
                    <label for="race" class="col-form-label">Раса</label>
                    <div class="col-sm-15">
                        <input type="text" class="form-control" name="race" value="{{ old('race') ?? '' }}">
                    </div>
                </div>
                <div class="row mb-3 bg-black ">
                    <label for="gender" class="col-form-label">Пол</label>
                    <div class="col-sm-15">
                        <input type="text" class="form-control" name="gender" value="{{ old('gender') ?? '' }}">
                    </div>
                </div>
                <div class="row mb-3 bg-black ">
                    <label for="height" class="col-form-label">Рост</label>
                    <div class="col-sm-15">
                        <input type="number" class="form-control" name="height" value="{{ old('height') ?? '' }}">
                    </div>
                </div>
                <div class="row mb-3 bg-black ">
                    <label for="weigh" class="col-form-label">Вес</label>
                    <div class="col-sm-15">
                        <input type="number" class="form-control" name="weigh" value="{{ old('weigh') ?? '' }}">
                    </div>
                </div>
                <div class="row mb-3 bg-black ">
                    <label for="personality" class="col-form-label">Характер</label>
                    <textarea name="personality">{{ old('personality') ?? '' }}</textarea>
                </div>
                <div class="row mb-3 bg-black ">
                    <label for="appearance" class="col-form-label">Описание внешнего вида</label>
                    <textarea name="appearance">{{ old('appearance') ?? '' }}</textarea>
                </div>
                <div class="row mb-3 bg-black ">
                    <label for="goals" class="col-form-label">Цели</label>
                    <textarea name="goals">{{ old('goals') ?? '' }}</textarea>
                </div>
                <div class="row mb-3 bg-black ">
                    <label for="motivation" class="col-form-label">Мотивация</label>
                    <textarea name="motivation">{{ old('motivation') ?? '' }}</textarea>
                </div>
                <div class="row mb-3 bg-black ">
                    <label for="history" class="col-form-label">История персонажа (до главных событий)</label>
                    <textarea name="history">{{ old('history') ?? '' }}</textarea>
                </div>
                <div class="row mb-3 bg-black ">
                    <label for="id_worldview" class="col-form-label">Мировоззрение</label>
                    <select name="id_worldview" required class="form-select">
                        @foreach($worldviews as $worldview)
                            <option value="{{ $worldview->id_worldview }}">{{ $worldview->worldview }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mb-3">
                    <label for="image" class="col-form-label">Внешность</label>
                    <div class="col-sm-15">
                        <input type="file" class="form-control" name="image" >
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Создать</button>
            </form>
        </div>
@endsection
