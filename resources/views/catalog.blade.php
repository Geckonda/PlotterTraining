@extends('Layouts.layout')

@section('title')
    Каталог
@endsection

@section('content')
        <div class="container" style="min-height: 500px">
            <div class="container w-100 d-flex justify-content-between">
                <h2>Каталог</h2>
                <div class="w-auto d-flex align-items-center " >
                    <form class="d-flex " style="max-width: 500px" method="POST" action="{{ route('searchBooks') }}">
                        @csrf
                        <input class="form-control me-2" type="search"  aria-label="Search" name="name">
                        <button class="btn btn-own" type="submit">Поиск</button>
                    </form>
                </div>
            </div>
            <div class="line-divider"></div>
            <div class="container pt-5 d-flex flex-wrap justify-content-center">
                @if(count($books) <= 0)
                    <div class="container mt-5 content d-flex flex-column align-items-center justify-content-center">
                        <div class="head fs-2" id="login">Книг не найдено</div>
                    </div>
                @endif
                @foreach($books as $book)
                        <div class="card m-3" style="width: 18rem;">
                            <div class="card-body">
                                <div class="img-container">
                                    <img src="{{ asset($book->book_cover) }}" alt="" class="card-img-top">
                                </div>
                                <h5 class="card-title text-center mb-3">{{ $book->title }}</h5>
                                <p class="card-text">Рейтинг: {{ $book->rate }}</p>
                                <p class="card-text">Статус: {{ $book->status }}</p>
                                <p class="card-text">Статус: {{ $book->genre }}</p>

                                    <div class="d-flex  flex-column justify-content-center mb-2">
                                        <a class="btn btn-own" href="{{ route('myOwnBook', ['id' => $book->id_book]) }}">Перейти</a>
                                    </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
@endsection
