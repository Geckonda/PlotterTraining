@extends('Layouts.layout')

@section('title')
    Где нас найти?
@endsection

@section('content')
    <div class="container" style="min-height: 500px;">
        <h2>Где нас найти?</h2>
        <div class="line-divider mb-5"></div>
        <div class="container d-flex flex-wrap">
            <div class="container  w-auto">
                <p>адрес: ХХХХХХХХХХХХ</p>
                <p>телефон: ХХХХХХХХХХХХ</p>
                <p>мыло: ХХХХХХХХХХХХ</p>
            </div>

            <div class="line-divider mb-5"></div>
            <div class="container h-auto map-container mb-5">
            </div>
            <div class="line-divider mb-5"></div>
        </div>
    </div>
@endsection
