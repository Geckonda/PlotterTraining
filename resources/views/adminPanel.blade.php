@extends('Layouts.layout')

@section('title')
    Админ панель
@endsection

@section('content')
    <div class="container d-flex align-items-center justify-content-center h-100">
        <div class="card p-5 card-field">
            <form class="d-flex flex-column  justify-content-center align-items-center" action="{{ route('addProduct') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h2>Добавить товар</h2>
                <div class="row mb-3 bg-black ">
                    <label for="name_product" class="col-sm-7 col-form-label">Название</label>
                    <div class="col-sm-15">
                        <input type="text" class="form-control" name="name_product">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="price_product" class="col-sm-7 col-form-label">Цена</label>
                    <div class="col-sm-15">
                        <input type="number" class="form-control" name="price_product">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="description" class="col-sm-7 col-form-label">Описание продукта</label>
                    <div class="col-sm-15">
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-15">
                        <label for="count_product" class="col-sm-7 col-form-label">Число продуктов</label>
                        <input type="number" class="form-control" name="count_product">
                    </div>
                </div>
                <div class="row mb-3">
                        <label for="count_product" class="col-sm-7 col-form-label">Категории продуктов</label>
                            <select name="id_category">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id_category }}">{{ $category->name_category }}</option>
                                @endforeach
                            </select>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-15">
                        <label for="path_product" class="col-sm-7 col-form-label">Фотография товара</label>
                        <input  class="form-control" type="file" name="image" >
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>

@endsection
