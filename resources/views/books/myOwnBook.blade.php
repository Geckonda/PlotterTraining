@extends('Layouts.layout')

@section('styles')
    <link rel="stylesheet" href="{{ asset('/assets/css/books.css') }}">
@endsection

@section('title')
    {{ $book->title }}
@endsection

@section('content')
    <div class="container container-color" >
        <div class="container w-100 d-flex justify-content-between pb-1">
            <h2>{{ $book->title }}</h2>
            <div class="w-auto d-flex align-items-center " >
                @auth()
                    @if(auth()->user()->isBookOwner($book->id_book))
                    <a class="btn btn-own" href="{{ route('bookUpdateForm', ['id' => $book->id_book]) }}">Редактировать</a>
                    @endif
                @endauth
            </div>
        </div>
        <div class="line-divider "></div>
        @if( session('msg') !== null )
            <div class="mt-2">
                <div class="alert alert-success" role="alert">
                    {{ session('msg') }}
                </div>
            </div>
        @endif
        <div class="book-container">
            <div class="content-block">
                <div class="book-info">
                    <h1 class="text-center">{{$book->title}}</h1>
                    <div class="line-divider"></div>
                    <h3>Рейтинг: {{ $book->rate }}</h3>
                    <h3>Жанр: {{ $book->genre }}</h3>
                    <h3 class="mb-4">Статус: {{ $book->status }}</h3>
                    <div class="line-divider"></div>
                    <p><strong>Описание:</strong>{{ $book->description }}</p>
                </div>

                <div class="line-divider"></div>
            <div class="info-block">
                <div class="img-book-cover-block">
                    <img src="{{ asset($book->book_cover)}}" alt="" class="img-book-cover">
                </div>
                <div class="nav-block">
                    <nav class="navbar navbar-expand-lg navbar-light  d-flex justify-content-around">
                        @auth()
                            @if(auth()->user()->isBookOwner($book->id_book))
                                 <a class="btn btn-own mb-2" href="#">Идеи книги</a>
                            @endif
                        @endauth
                        <a class="btn btn-own mb-2" href="{{ route('getAllCharacters', ['id' => $book->id_book]) }}">Персонажи</a>
                        <a class="btn btn-own mb-2" href="#">Эпизоды</a>

                    </nav>
                </div>
            </div>



            </div>

        </div>
@endsection
