@extends('Layouts.layout')

@section('title')
    {{ $book->title }} : Персонажи
@endsection

@section('content')
    <div class="container" >
        <div class="container w-100 d-flex justify-content-between">
            <h2>{{ $book->title }} : Персонажи</h2>
            <div class="w-auto d-flex align-items-center " >
                <form class="d-flex " style="max-width: 500px" method="POST" action="{{ route('searchMyCharacters', ['id' => $book->id_book]) }}">
                    @csrf
                    <input class="form-control me-2" type="search"  aria-label="Search" name="name">
                    <button class="btn btn-own" type="submit">Поиск</button>
                </form>
            </div>
        </div>
        <div class="line-divider "></div>
        <div class="w-100 d-flex flex-row-reverse">
            @auth()
                @if(auth()->user()->isBookOwner($book->id_book))
                     <a class="btn btn-success" href="{{ route('characterCreateForm', ['id' => $book->id_book]) }}">Создать персонажа</a>
                @endif
            @endauth
        </div>
        @if( session('msg') !== null )
            <div class="mt-2">
                <div class="alert alert-success" role="alert">
                    {{ session('msg') }}
                </div>
            </div>
        @endif
        @if(count($characters) <= 0)
            <div class="container mt-5 content d-flex flex-column align-items-center justify-content-center">
                <div class="head fs-2" id="login">Персонажей не найдено</div>
            </div>
        @endif
        <div class="container pt-5 d-flex flex-wrap justify-content-center">
            @foreach($characters as $character)
                <div class="card m-3" style="width: 18rem;">
                    <div class="card-body">
                        <img src="{{ asset($character->picture) }}" alt="" class="card-img-top">
                        <h3 class="card-title text-center mb-3">{{ $character->name }}</h3>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-own" href="">Перейти</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
