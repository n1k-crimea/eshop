@extends('admin.layouts.app')
@section('title', 'Категория')
@section('content')
<div class="container">
    <div class="col-md-12">
        <h1>Категория Бытовая техника</h1>
        <p>
        <form action="{{ route('categories.destroy', $category) }}" method="POST">
            <a class="btn btn-warning" type="button" href="{{ route('categories.edit', $category) }}">Редактировать</a>
            @csrf
            @method('DELETE')
            <input class="btn btn-danger" type="submit" value="Удалить" onclick="return confirm('Вы подтверждаете удаление?')">
        </form>
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
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $category->code }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $category->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $category->desc }}</td>
            </tr>
            <tr>
                <td>Изображение</td>
                <td><img src="{{ Storage::url($category->img) }}" height="240px"></td>
            </tr>
            <tr>
                <td>Кол-во товаров</td>
                <td>{{ $category->products->count() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
