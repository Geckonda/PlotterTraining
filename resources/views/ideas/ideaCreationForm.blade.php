@extends('Layouts.layout')

@section('title')
    Новая идея
@endsection

@section('content')
    <div class="container d-flex align-items-center justify-content-center h-100">
        <div class="card p-5 card-field">
            <form class="d-flex flex-column  justify-content-center align-items-center" action="{{ route('ideaCreate') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h2>Новая идея</h2>
                <div class="row mb-3 bg-black ">
                    <label for="topic" class="col-form-label">Тема идеи</label>
                    <div class="col-sm-15">
                        <input type="text" class="form-control" name="topic" value="{{ old('topic') ?? '' }}">
                    </div>
                </div>
                @error('topic')
                <div class="mt-2">
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                </div>
                @enderror
                <div class="row mb-3 bg-black ">
                    <label for="description" class="col-form-label">Содержание идеи</label>
                    <textarea name="description">{{ old('description') ?? '' }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>

        </div>
@endsection
