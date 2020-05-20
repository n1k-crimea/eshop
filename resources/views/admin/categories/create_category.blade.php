@extends('admin.layouts.app')
@section('title', 'Создать категорию')
@section('content')
<div class="container">
    <div class="col-md-12">
            <h1>Создать Категорию</h1>
        <form method="POST" enctype="multipart/form-data" action="{{ route('categories.store') }}">
            @csrf
            <div>
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="code" id="code" value="">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="name" value="">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                    <div class="col-sm-6">
							<textarea name="desc" id="description" cols="72" rows="7"></textarea>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Изображение: </label>
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
