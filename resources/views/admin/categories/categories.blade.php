@extends('admin.layouts.app')
@section('title', 'Категории')
@section('content')
<div class="container">
    <div class="col-md-12">
        <h1>Категории</h1>
        <p>
            <a class="btn btn-secondary" type="button"
               href="{{ route('categories.create') }}">Добавить категорию</a>
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
                    Действия
                </th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->code }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <img src="
                            @if($category->img)
                                {{ Storage::url($category->img) }}
                            @else
                                {{ asset('img/placeholder.jpg') }}
                            @endif"
                        width="64px">
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('categories.show', $category) }}">Открыть</a>
                                <a class="btn btn-warning" type="button" href="{{ route('categories.edit', $category) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить" onclick="return confirm('Вы подтверждаете удаление?')">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-secondary" type="button"
           href="{{ route('categories.create') }}">Добавить категорию</a>
    </div>
</div>
@endsection
