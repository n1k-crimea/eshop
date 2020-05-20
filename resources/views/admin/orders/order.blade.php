@extends('admin.layouts.app')
@section('title', 'Заказ')
@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="panel">
            <h1>Заказ №{{ $order->id }}</h1>
            <p>Заказчик: <b>{{ $order->name }}</b></p>
            <p>Номер телефона: <b>{{ $order->phone }}</b></p>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Стоимость</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($order->products as $product)
                    <tr>
                        <td>
                            <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                                <img height="56px" src="
                                    @if($product->img)
                                {{ Storage::url($product->img) }}
                                @else
                                {{ asset('img/placeholder.jpg') }}
                                @endif">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td><span class="badge"> {{ $product->pivot->count }}</span></td>
                        <td>{{ $product->price }} руб.</td>
                        <td>{{ $product->get_sum_price() }} руб.</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Общая стоимость:</td>
                    <td><b>{{ $order->get_total_price() }} руб.</b></td>
                </tr>
                </tbody>
            </table>
            <br>
        </div>
    </div>
</div>
@endsection
