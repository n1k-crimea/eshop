@extends('admin.layouts.app')
@section('title', 'Редактировать товар')
@section('content')
<div class="container">
    <div class="col-md-12">
            <h1>Редактировать товар <b>{{ $product->name }}</b></h1>
        <form method="POST" enctype="multipart/form-data" action="{{ route('products.update', $product) }}">
            <div>
                @method('PUT')
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="code" id="code"
                               value="{{ $product->code }}">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="name"
                               value="{{ $product->name }}">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">Категория: </label>
                    <div class="col-sm-6">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                    @if($product->category_id == $category->id)
                                        selected
                                    @endif
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                    <div class="col-sm-6">
								<textarea name="desc" id="description" cols="72"
                                          rows="7">{{ $product->desc }}</textarea>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Текущее изображение: </label>
                    <div class="col-sm-10">
                        <img src="{{ Storage::url($product->img) }}" height="64px">
                    </div>
                </div>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Загрузить новое изображение: </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            <input type="file" name="img" id="image">
                        </label>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="price" class="col-sm-2 col-form-label">Цена: </label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="price" id="price"
                               value="{{ $product->price }}">
                    </div>
                </div>
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
</div>
@endsection
