@extends('admin.layouts.app')
@section('title', 'Редактировать категорию')
@section('content')
<div class="container">
    <div class="col-md-12">
        <h1>Редактировать Категорию <b>{{ $category->name }}</b></h1>
        <form method="POST" enctype="multipart/form-data" action="{{ route('categories.update', $category) }}">
            <div>
                @method('PUT')
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="code" id="code"
                               value="{{ $category->code }}">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="name"
                               value="{{ $category->name }}">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                    <div class="col-sm-6">
							<textarea name="desc" id="description" cols="52" rows="5">{{ $category->desc }}</textarea>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Текущее изображение: </label>
                    <div class="col-sm-10">
                        <img src="{{ Storage::url($category->img) }}" height="64px">
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
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
</div>
@endsection
