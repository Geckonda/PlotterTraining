@extends('Layouts.layout')

@section('title')
    Мои идеи
@endsection

@section('content')
    <div class="container" style="min-height: 500px">
        <div class="container w-100 d-flex justify-content-between">
            <h2>Мои идеи</h2>

        </div>
        <div class="line-divider"></div>
        <div class="w-100 d-flex flex-row-reverse">
            <a class="btn btn-success" href="{{ route('ideaCreationForm') }}">Новая идея</a>
        </div>
        @if( session('msg') !== null )
            <div class="mt-2">
                <div class="alert alert-success" role="alert">
                    {{ session('msg') }}
                </div>
            </div>
        @endif
        @if(count($ideas) <= 0)
            <div class="container mt-5 content d-flex flex-column align-items-center justify-content-center">
                <div class="head fs-2" id="login">Идей не найдено</div>
            </div>
        @endif
        <div class="container pt-5 d-flex flex-wrap justify-content-center">
            @foreach($ideas as $idea)
                <div class="dropdown w-100 mb-3">
                    <button class="btn btn-own dropdown-toggle w-100 " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="idea_text" style="color: white">{{ $idea->topic }}</span>
                    </button>
                    <div class="dropdown-menu w-100" aria-labelledby="dropdownMenu2">
                        <p style="padding-left: 15px; text-align: center">{{ $idea->description }}</p>
                        <a class="dropdown-item text-center  text-success" type="button">Редактивировать</a>
                        <a class="dropdown-item text-center  text-danger" type="button">Удалить</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
