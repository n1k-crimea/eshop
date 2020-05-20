@extends('admin.layouts.app')
@section('title', 'Товар')
@section('content')
<div class="container">
    <div class="col-md-12">
        <h1>{{ $product->name }}</h1>
        <p>
        <div class="btn-group" role="group">
            <form action="{{ route('products.destroy', $product) }}" method="POST">
                <a class="btn btn-warning" type="button"
                   href="{{ route('products.edit', $product) }}">Редактировать</a>
                @csrf
                @method('DELETE')
                <input class="btn btn-danger" type="submit" value="Удалить" onclick="return confirmDelete()">
            </form>
        </div>
        </p>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $product->id}}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $product->code }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $product->desc }}</td>
            </tr>
            <tr>
                <td>Изображение</td>
                <td><img src="{{ Storage::url($product->img) }}" height="240px"></td>
            </tr>
            <tr>
                <td>Категория</td>
                <td>{{ $product->category->name }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
