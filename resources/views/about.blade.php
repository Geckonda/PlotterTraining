@extends('Layouts.layout')

@section('title')
    Smarttime
@endsection

@section('content')
    @if(session('msg') !== null )
        <div class="alert alert-success text-center" role="alert">
            {{ session('msg') }}
        </div>
    @endif
    <div class="container">
        <h2>Plotter</h2>
        <div class="line-divider"></div>
        <div class="container ">
            <h3>Будущий графический инструмент для писателей!</h3>
        </div>
    </div>
@endsection
