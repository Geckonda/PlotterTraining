@extends('Layouts.layout')

@section('title')
    Новая книга
@endsection

@section('content')
    <div class="container d-flex align-items-center justify-content-center h-100">
        <div class="card p-5 card-field">
            <form class="d-flex flex-column  justify-content-center align-items-center" action="{{ route('bookCreate') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h2>Новая книга</h2>
                <div class="row mb-3 bg-black ">
                    <label for="id_modificator" class="col-form-label">Уровень доступа книги</label>
                    <select name="id_modificator" required class="form-select">
                        @foreach($modificators as $modificator)
                            <option value="{{ $modificator->id_modificator }}">{{ $modificator->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mb-3 bg-black ">
                    <label for="title" class="col-form-label">Название книги*</label>
                    <div class="col-sm-15">
                        <input type="text" class="form-control" name="title" value="{{ old('title') ?? '' }}">
                    </div>
                </div>
                @error('title')
                <div class="mt-2">
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                </div>
                @enderror
                <div class="row mb-3 bg-black ">
                    <label for="id_rate" class="col-form-label">Возрастной рейтинг</label>
                    <select name="id_rate" required class="form-select">
                        @foreach($rating as $rate)
                            <option value="{{ $rate->id_rate }}">{{ $rate->rate }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mb-3 bg-black ">
                    <label for="id_genre" class="col-form-label">Главный жанр</label>
                    <select name="id_genre" required class="form-select">
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id_genre }}">{{ $genre->genre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mb-3 bg-black ">
                    <label for="id_status" class="col-form-label">Статус работы</label>
                    <select name="id_status" required class="form-select">
                        @foreach($statuses as $status)
                            <option value="{{ $status->id_status }}">{{ $status->status }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mb-3 bg-black ">
                    <label for="description" class="col-form-label">Краткое описание*</label>
                    <textarea name="description">{{ old('description') ?? '' }}</textarea>
                </div>
                @error('description')
                <div class="mt-2">
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                </div>
                @enderror
                <div class="row mb-3">
                    <label for="image" class="col-form-label">Обложка книги (необязательно)</label>
                    <div class="col-sm-15">
                        <input type="file" class="form-control" name="image" >
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>

        </div>
@endsection
