@extends('admin.layouts.app')
@section('title', 'Товары')
@section('content')
<div class="container">
    <div class="col-md-12">
        <h1>Товары</h1>
        <p><a class="btn btn-secondary" type="button" href="{{ route('products.create') }}">Добавить товар</a>
        </p>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Код
                </th>
                <th>
                    Название
                </th>
                <th>
                    Изображение
                </th>
                <th>
                    Категория
                </th>
                <th>
                    Цена
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id}}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        <img src="
                            @if($product->img)
                                {{ Storage::url($product->img) }}
                            @else
                                {{ asset('img/placeholder.jpg') }}
                            @endif"
                        width="64px">
                    </td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                <a class="btn btn-success" type="button"
                                   href="{{ route('products.show', $product) }}">Открыть</a>
                                <a class="btn btn-warning" type="button"
                                   href="{{ route('products.edit', $product) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить" onclick="return confirmDelete()">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-secondary" type="button" href="{{ route('products.create') }}">Добавить товар</a>
    </div>
</div>
@endsection
