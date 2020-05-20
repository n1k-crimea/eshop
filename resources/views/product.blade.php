@extends('master')
@section('title', 'Товар: '.$product->name)
@section('content')
    <div class="breadcrumb">
        <h2>{{ $product->name }}</h2>
    </div>
    <div class="row">
            <table class="table my-table" >
                <tbody>
                <tr>
                    <td>Цена</td>
                    <td>{{ $product->price }} руб.</td>
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
                    <td><img src="
                        @if($product->img)
                            {{ Storage::url($product->img) }}
                        @else
                            {{ asset('img/placeholder.jpg') }}
                        @endif"
                             height="240px">
                    </td>
                </tr>
                <tr>
                    <td>
                        <form action="{{route('cart_add', $product)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">В корзину</button>
                        </form>
                    </td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
@endsection
