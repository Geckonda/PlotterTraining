@extends('Layouts.layout')

@section('title')
@endsection

@section('content')
    <div class="container" >
        <div class="container w-100 d-flex justify-content-between">
            <h2>Мои книги</h2>
            <div class="w-auto d-flex align-items-center " >
                <form class="d-flex " style="max-width: 500px" method="POST" action="{{ route('searchMyBooks') }}">
                    @csrf
                    <input class="form-control me-2" type="search"  aria-label="Search" name="name">
                    <button class="btn btn-own" type="submit">Поиск</button>
                </form>
            </div>
        </div>
        <div class="line-divider "></div>
        <div class="w-100 d-flex flex-row-reverse">
            <a class="btn btn-success" href="{{ route('bookCreationForm') }}">Новая книга</a>
        </div>
        @if( session('msg') !== null )
        <div class="mt-2">
            <div class="alert alert-success" role="alert">
                {{ session('msg') }}
            </div>
        </div>
        @endif
        @if(count($books) <= 0)
            <div class="container mt-5 content d-flex flex-column align-items-center justify-content-center">
                <div class="head fs-2" id="login">Книг не найдено</div>
            </div>
        @endif
        <div class="container pt-5 d-flex flex-wrap justify-content-center">
            @foreach($books as $book)
                <div class="card m-3" style="width: 18rem;">
                    <div class="card-body">
                        <div class="img-container">
                            <img src="{{ asset($book->book_cover) }}" alt="" class="card-img-top">
                        </div>
                        <h3 class="card-title text-center mb-3">{{ $book->title }}</h3>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-own" href="{{ route('myOwnBook', ['id' => $book->id_book]) }}">Перейти</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
